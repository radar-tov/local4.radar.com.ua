<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Requests\BuyRequest;
use App\Models\Category;
use App\Models\CustomerGroup;
use App\Models\FilterValue;
use App\Models\LifeComplex;
use App\Models\Metro;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Slider2;
use App\Models\User;
use App\Services\AccommodationComposer;
use App\Services\BuyService;
use App\Services\FilterService;
use App\Services\FiltersService;
use App\Services\ProductService;
use App\StaticPage;
use Cache;
use Carbon\Carbon;
use Faker\Factory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

/**
 * Class FrontendController
 * @package App\Http\Controllers\Frontend
 */
class FrontendController extends BaseController
{
	/**
	 * @var ProductService
	 */
	private $productService;

	/**
	 * @param ProductService $productService
	 */
	function __construct(ProductService $productService)
	{
		$this->productService = $productService;
		$this->middleware('pageHasFilter', ['only' => 'catalog']);
		$this->middleware('guest', ['only' => ['login', 'registration']]);
		$this->middleware('frontAuth', ['only' => ['cabinet']]);

		parent::__construct();
	}

	/**
	 * @param Slider $slider
	 * @return \Illuminate\View\View
	 *
	 * Show index page with slider
	 */
	public function index(Slider $slider, Slider2 $slider2)
	{
		return view('frontend.index')->withSliders($slider->show()->orderBy('order','desc')->get())
		->withSliders2($slider2->show()->orderBy('order','desc')->get());
	}


	/**
	 * @param Request $request
	 * @param FilterService $filterService
	 * @param $categorySlug
	 * @return \Illuminate\View\View
	 * @internal param FiltersService $filtersService
	 *
	 * Show products by category
	 */
	public function catalog(Request $request, FilterService $filterService, $categorySlug, $subcategorySlug=null)
	{
		// Ajax request is used when
		// paginate or filter products

		$category = Category::where('show',1)->where('slug', $categorySlug)->with('children')->with('filters')->first();

		$subcategory = Category::where('slug', $subcategorySlug)->with('children')->with('filters')->first();

        if(!$category) abort(404);

		if($category->children->count() > 0 and !$subcategory){
			$categories = $category->children;
			$date = new \DateTime($category->updated_at);

			//Получаем header If-Modified-Since
            $ifModifiedSince = strtotime(substr($request->header('If-Modified-Since'), 5));
            $LastModified = strtotime(substr($date->format("D, d M Y H:i:s"), 5));
            if($ifModifiedSince){
                if($ifModifiedSince >= $LastModified){
                    if(env('APP_ENV') == 'production'){
						if($_ENV['BOT']){
							return Response::view('frontend.subcategories', compact('categories','category'), 304);
						}
					}
                }
            }

			return Response::view('frontend.subcategories', compact('categories','category'))
				->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');
	  	}

		if($request->ajax()){
			return $filterService->getFilteredProducts($request);
		}

		if(!Category::where('show',1)->where('slug', $subcategorySlug)->first()){
			abort(404);
		}

	    if(!$subcategory){
			$subcategory = $category;
		}

        $date = new \DateTime($subcategory->updated_at);

		if(env('APP_ENV') == 'production'){
			if($_ENV['BOT']){
				return Response::view('frontend.catalog', compact('subcategory', 'category'), 304);
			}
		}

		return Response::view('frontend.catalog', compact('subcategory', 'category'))
			->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');

	}

	public static function sitemapCategories()
	{
		return Category::where('show',1)->where('parent_id', 0)->where('sitemap', 1)->get();
	}

	public static function sitemapSubCategories($id)
	{
		return Category::where('show',1)->where('parent_id', $id)->where('sitemap', 1)->get();
	}

	public function getSitemapCategories()
	{
        $content = Storage::disk('xml')->get('sitemap_categories.xml');
        return response($content, 200)->header('Content-type', 'text/xml');
	}


	/**
	 * @param $categorySlug
	 * @param $productSlug
	 * @param Request $request
	 * @return \Illuminate\View\View
	 *
	 * Show single product view
	 */
	public function product($categorySlug, $subcategorySlug, $productSlug, Request $request)
	{
		$product = Product::whereRaw("products.slug = '$productSlug'" )
            ->whereHas(
                'category', function($category) use($subcategorySlug){
			$category->where('slug', $subcategorySlug);
		})
		->visible()
		->with(
            'relevantSale',
            'images',
            'category',
            'relatedProducts',
            'rates.users',
            'reviews.user',
            'stocks.orderedProducts',
            'filterValuesWithFilters'
        )
		->first();

        if(!$product) abort(404);

		// Ajax request is used
		// for assess product
		if($request->ajax()){
			$product->rates()->create(['rate' => $request->get('val')]);
			$request->session()->push('rated', $product->id );

			return $product->rates()->avg('rate');
		}

		// need for reviews
		$productReviewId = $product->id;

        $date = new \DateTime($product->updated_at);

        //Получаем header If-Modified-Since
        $ifModifiedSince = strtotime(substr($request->header('If-Modified-Since'), 5));
        $LastModified = strtotime(substr($date->format("D, d M Y H:i:s"), 5));
        if($ifModifiedSince){
            if($ifModifiedSince >= $LastModified){
				if(env('APP_ENV') == 'production'){
					if($_ENV['BOT']){
						return Response::view('frontend.product', compact('product','productReviewId'), 304);
					}
				}
			}
        }


        return Response::view('frontend.product', compact('product','productReviewId'))
            ->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');

	}


	public static function sitemapProducts($id_cat)
	{
		return Product::where('category_id', $id_cat)->get();
	}

	public static function getProductsYML($cat_id, $in, $to)
	{
		//echo "$cat_id, $in, $to\n";
		return Product::where('category_id', $cat_id)->whereBetween('id', array($in, $to))->get();
	}

	public function getSitemapProducts()
	{
        $content = Storage::disk('xml')->get('sitemap_products.xml');
        return response($content, 200)->header('Content-type', 'text/xml');
	}

	public function getYandexProducts()
	{
		$content = Storage::disk('xml')->get('yml_products.xml');
		return response($content, 200)->header('Content-type', 'text/xml');
	}



	/**
	 * @param Request $request
	 * @param ProductService $productService
	 * @return \Illuminate\View\View
	 * @internal param FilterService $filterService
	 */
	public function newProducts(Request $request, ProductService $productService)
	{

		// Ajax request is used when
		// paginate or filter products
		if($request->ajax()){
            $products = Product::where('is_new', true)
                ->ordered($request)
                ->withRelations()
                ->visible()
                ->original()
                ->paginate(15);
            return $productService->ajaxResponse($products);
        }

		// As we return 'frontend.catalog' view
		// just display custom page heading
		// instead of category title
		$header = 'Новинки';
		return view('frontend.catalog', compact('products', 'header'));
	}

	/**
	 * @param Request $request
	 * @param ProductService $productService
	 * @return \Illuminate\View\View
	 *
	 * Show products with discount
	 */
	public function saleProducts(Request $request, ProductService $productService)
	{
		$products = Product::where(function($query){
			$query->where('discount', '>', 0)->orHas('relevantSale');
		})
		->withRelations()
		->ordered($request)
		->visible()
        ->original()
		->paginate(15);

		// Ajax request is used when
		// paginate or filter products
		if($request->ajax()) return $productService->ajaxResponse($products);

		// As we return 'frontend.catalog' view
		// just display custom page heading
		// instead of category title
		$header = 'Скидки';

		return view('frontend.catalog', compact('products', 'header'));
	}


	/**
	 * @param Request $request
	 * @param ProductService $productService
	 * @return array|\Illuminate\View\View
	 */
	public function search(Request $request, ProductService $productService)
	{

		$products = Product::where(function($products) use($request){

			$products->where('title', 'LIKE', '%'.$request->get('search').'%')
					 ->orWhere('article', 'LIKE', '%'.$request->get('search').'%');
		})
		->withRelations()
		->ordered($request)
		->visible()
        ->original()
		->paginate(15);


		// Ajax request is used when
		// paginate search result
		if($request->ajax()) return $productService->ajaxResponse($products);


		// As we return 'frontend.catalog' view
		// just display custom page heading
		// instead of category title
		$header = 'Результаты поиска';
		$subcategory = Category::where('id', 143)->first();

		return view('frontend.catalog', compact('products', 'header', 'subcategory'));
	}

	/**
	 * @return \Illuminate\View\View
	 * Show contacts page
	 */
	public function contacts()
	{
		return view('frontend.contacts');
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View Show static 'service' page
     * Show static 'service' page
     */
	public function staticPage(Request $request)
	{
		$slug = trim($request->getRequestUri(), '/');
		$page = StaticPage::where('slug', $slug)->first();

        if(!$page) abort(404);

        $date = new \DateTime($page->updated_at);

        //Получаем header If-Modified-Since
        $ifModifiedSince = strtotime(substr($request->header('If-Modified-Since'), 5));
        $LastModified = strtotime(substr($date->format("D, d M Y H:i:s"), 5));
        if($ifModifiedSince){
            if($ifModifiedSince >= $LastModified){
				if(env('APP_ENV') == 'production'){
					if($_ENV['BOT']){
						return Response::view('frontend.static', compact('page'), 304);
					}
				}
			}
        }

 		return Response::view('frontend.static', compact('page'))->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');
	}


	public static function sitemapPages()
	{
		return StaticPage::where('sitemap', 1)->get();
	}

	public function getSitemapPages()
	{
		$content = Storage::disk('xml')->get('sitemap_page.xml');
        return response($content, 200)->header('Content-type', 'text/xml');
	}


	/**
	 * @return \Illuminate\View\View
	 * Show cart view
	 */
	public function cart()
	{
		return view('frontend.cart');
	}

	/**
	 * @return \Illuminate\View\View
	 * Show Login form
	 */
	public function login()
	{
		return view('frontend.login');
	}


	public function compare()
	{


		return view('frontend.compare');
	}

	/**
	 * @return \Illuminate\View\View
	 * Show registration form
	 */
	public function registration()
	{
		return view('frontend.registration');
	}

	/**
	 * @return \Illuminate\View\View
	 * Show users cabinet if logged
	 */
	public function cabinet()
	{
		$user = Auth::user()->load('orders');
		return view('frontend.cabinet', compact('user'));
	}

	/**
	 * @return \Illuminate\View\View
	 * Show "forgot password" form
	 */
	public function password()
	{
		return view('frontend.password');
	}

	/**
	 * @param BuyRequest|Request $request
	 * @param BuyService $buyService
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * Purchase products
	 * If user is not logged and users sole purchase - creates new user with role_id = User::GUEST_ID
	 */
	public function buy(BuyRequest $request, BuyService $buyService)
	{

		if(!Auth::check() && !$request->has('ones'))
			return redirect()->back()->withErrors('Вы должны быть зарегистрированы, либо оформлять заказ как разовую покупку');

		// If it's sole purchase we apply custom
		// validation rules for this request.
		if($request->has('ones') && $buyService->validate($request)->fails())
			return redirect()->back()->withErrors($buyService->validate($request))->withInput();

		$order = $buyService->registerOrder($request);

        destroyCart();

		return view('frontend.thank_you', compact('order'));

	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * Update user data from cabinet
	 *
	 */
	public function updateUserData(Request $request)
	{
		Auth::user()->update($request->only('phone','email','password', 'country','city', 'address', 'name'));
		return redirect()->back();
	}

	/**
	 * @param $orderId
	 * @return \Illuminate\View\View
	 *
	 * Show order info in users cabinet
	 */
	public function showOrder($orderId)
	{
		$order = Order::with('products.original.category', 'products.original.thumbnail')->find($orderId);
		return view('frontend.order', compact('order'));
	}


	public function otvet(){
		switch (Session::get('from_otvet')) {
			case 'addKolProduct':
				return view('frontend.otvet.addKolProduct');
				break;
			case 'addProduct':
				return view('frontend.otvet.addProduct');
				break;
			case 'contact':
				return view('frontend.otvet.contact');
				break;
		}
		dump(Session::all());
	}
}
