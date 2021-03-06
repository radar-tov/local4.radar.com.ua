<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Requests\BuyRequest;
use App\Models\Category;
use App\Models\CustomerGroup;
use App\Models\File;
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
use App\Http\Controllers\Frontend\SmsApiTwitterController;
use App\Models\Online;
use App\Models\MyLog;
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
	public function catalog(Request $request, FilterService $filterService, $categorySlug, $subcategorySlug=null, MyLog $myLog)
	{

	    // Ajax request is used when
		// paginate or filter products
		$category = Category::where('show',1)->where('slug', $categorySlug)->with('children')->with('filters')->first();
		$subcategory = Category::where('slug', $subcategorySlug)->with('children')->with('filters')->first();

        if(!$category) abort(404);



		if($category->children->count() > 0 and !$subcategory){
            // Список подкатегорий без фильтров
            if($subcategorySlug != null) abort(404);

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
            /*if($request->session()->has('bot') && !$request->session()->get('bot')){
                $myLog->add("Просмотр категории " . $categorySlug . '/' . $subcategorySlug);
            }*/
            $myLog->add("Просмотр категории " . $categorySlug);
			return Response::view('frontend.subcategories', compact('categories','category'));
				//->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');
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


		//Получаем header If-Modified-Since
		$ifModifiedSince = strtotime(substr($request->header('If-Modified-Since'), 5));
		$LastModified = strtotime(substr($date->format("D, d M Y H:i:s"), 5));
		if($ifModifiedSince){
			if($ifModifiedSince >= $LastModified){
				if(env('APP_ENV') == 'production'){
					if($_ENV['BOT']){
						return Response::view('frontend.catalog', compact('subcategory', 'category'), 304);
					}
				}
			}
		}
        /*if($request->session()->has('bot') && !$request->session()->get('bot')){
            $myLog->add("Просмотр категории " . $categorySlug . '/' . $subcategorySlug);
        }*/
        $myLog->add("Просмотр категории " . $categorySlug . '/' . $subcategorySlug);

		return Response::view('frontend.catalog', compact('subcategory', 'category'));
			//->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT')

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
	public function product($categorySlug, $subcategorySlug, $productSlug, Request $request, MyLog $myLog)
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
			'files',
            'category',
            'relatedProducts',
            'similarProducts',
            'rates.users',
            'reviews.user',
            'stocks.orderedProducts',
            'filterValuesWithFilters',
			'getParameters',
			'getCharacteristics'
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
        /*if($request->session()->has('bot') && !$request->session()->get('bot')){
            $myLog->add("Просмотр товара " . $productSlug);
        }*/
        $myLog->add("Просмотр товара " . $productSlug);

        return Response::view('frontend.product', compact('product','productReviewId'));
            //->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');

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
	public function staticPage(Request $request, MyLog $myLog)
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
        /*if($request->session()->has('bot') && !$request->session()->get('bot')){
            $myLog->add("Просмотр категории " . $categorySlug . '/' . $subcategorySlug);
        }*/
        $myLog->add("Просмотр страницы " . $slug);
 		return Response::view('frontend.static', compact('page'));
			//->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');
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

        //Отпрака смс через твиттер
        /*if(env('APP_ENV') == 'production'){
            $config = \Config::get('sms_twitter');
            $sms = 'Новый заказ!';
            $twitter = new SmsApiTwitterController($config);
            $url = 'https://api.twitter.com/1.1/statuses/update.json';
            $twitter->buildOauth($url, 'POST');
            $twitter->setPostfields(['status' => $sms])->performRequest();
        }*/

		return view('frontend.thank_you', compact('order'));

	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * Update user data from cabinet
	 *
	 */
	public function updateUserData(User $user, Request $request)
	{
	    if($user->where('phone', $request->phone)->first()){
            Auth::user()->update($request->only('phone','email','password', 'city', 'address', 'name'));
            return redirect()->back();
        }else{
            return redirect()->back()->with('message', 'Этот телефон уже занят.');
        }
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
	    //dump(Session::all());
	    if(Session::has('from_otvet')){
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
        }else{
            sleep(1);
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
        }

		//dump(Session::all());
	}

	public function callback(){
		return view('frontend.modal.callback');
	}

	public function montagniki(){
		return view('frontend.modal.montagniki');
	}

	public function comment($id){
		$data = ['id'=>$id];
		return view('frontend.modal.comment', $data);
	}

	public function password_modal(){
		return view('frontend.modal.password');
	}

    public function download($id){
        $file = File::find($id);
        if(!$file){
            abort(404);
        }
        if(!$_ENV['BOT']){
            $file->update(['downloads' => $file->downloads + 1]);
        }

        $fileName = explode('__',  $file->path);
        return Response::download($file->path, $fileName[1]);
    }

    public function oneClick($id){
        $product = Product::find($id);
        return view('frontend.otvet.oneClick', compact('product'));
    }

    public function getcart(){
        $records = Online::where('updated_at', '<', Carbon::now()->subMinute(2))->get();
        if($records->count() > 0){
            foreach ($records as $record) {
                $record->delete();
            }
        }

        $onl = Online::where('token', session('_token'))->first();
        if($onl){
            $onl->ip = $_SERVER['REMOTE_ADDR'];
            $onl->page = $_SERVER['HTTP_REFERER'];
            $onl->token = session('_token');
            $onl->updated_at = Carbon::now();
            $onl->save();
        }else{
            $onl = new Online();
            $onl->ip = $_SERVER['REMOTE_ADDR'];
            $onl->page = $_SERVER['HTTP_REFERER'];
            $onl->token = session('_token');
            $onl->save();
        }
        return view('frontend.otvet.cart');
    }
}