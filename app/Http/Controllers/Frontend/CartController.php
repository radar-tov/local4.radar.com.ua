<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class CartController
 * @package App\Http\Controllers\Frontend
 */
class CartController extends Controller {

	/**
	 * @var Cart
	 */
//	private $cart;
	//
	//	public function __construct(Cart $cart)
	//	{
	//		$this->cart = $cart;
	//	}

    /**
     * @param Request $request
     * @return array
     */
    public function addProduct(Request $request) {
		$product = Product::visible()->with('relevantSale', 'thumbnail', 'category')->find($request->get('productId'));

        $parentCategorySlug = Category::select('slug', 'title')
            ->where('id', '=', Category::where('id', '=', $product->category->id)->value('parent_id'))
            ->get();

        Cart::instance('main')->add(
			$id = $product->clone_of ?: $product->id,
			$title = $product->title,
			$qty = 1,
			$price = str_replace(' ', '', $product->hasDiscount() ? $product->getNewPrice() : $product->getPrice()),
            //$price = str_replace(' ', '', $product->out_price),
			$options = [
                'instance' => 'main',
				'excerpt' => $product->excerpt,
				'article' => $product->article,
				'thumbnail' => count($product->thumbnail) ? $product->thumbnail->first()->path : '',
                'categorySlug' => $parentCategorySlug[0]->slug.'/'.$product->category->slug,
				'productSlug' => $product->slug,
			]);

        //$data_otvet = ['qty'=>$qty, 'count' => $this->calcProductsInCart(), 'total' => $this->calcTotalPrice()];
        $request->session()->put('from_otvet', 'addProduct');
        //Session::put('otvet', $data_otvet);
        $request->session()->save();

		return ['count' => $this->calcProductsInCart(), 'total' => $this->calcTotalPrice()];
	}


    public function addKolProduct(Request $request){

        $product = Product::visible()->with('relevantSale', 'thumbnail', 'category')->find($request->get('productId'));

        $parentCategorySlug = Category::select('slug', 'title')
            ->where('id', '=', Category::where('id', '=', $product->category->id)->value('parent_id'))
            ->get();

        Cart::instance('main')->add(
            $id = $product->clone_of ?: $product->id,
            $title = $product->title,
            $qty = $request->get('qty'),
            $price = str_replace(' ', '', $product->hasDiscount() ? $product->getNewPrice() : $product->getPrice()),
            //$price = str_replace(' ', '', $product->out_price),
            $options = [
                'instance' => 'main',
                'excerpt' => $product->excerpt,
                'article' => $product->article,
                'thumbnail' => count($product->thumbnail) ? $product->thumbnail->first()->path : '',
                'categorySlug' => $parentCategorySlug[0]->slug.'/'.$product->category->slug,
                'productSlug' => $product->slug,
            ]);

        $data_otvet = ['qty'=>$qty, 'count' => $this->calcProductsInCart(), 'total' => $this->calcTotalPrice()];
        Session::put('from_otvet', 'addKolProduct');
        Session::put('otvet', $data_otvet);
        Session::save();
        //dump(Session::all());

        return ['count' => $this->calcProductsInCart(), 'total' => $this->calcTotalPrice()];
    }

    public function searchCompare($id){
        return Cart::instance('compare')->search(function($item) use ($id) {
            return $id == $item->id;
        });
    }


    public function addToCompare(Request $request)
    {

        Cart::instance('compare');

        $product = Product::visible()->with('relevantSale', 'thumbnail', 'category')->find($request->get('productId'));

        $parentCategorySlug = Category::select('slug', 'title')
            ->where('id', '=', Category::where('id', '=', $product->category->id)->value('parent_id'))
            ->get();
        
        if($this->searchCompare($product->id)) return null;


        $chars = [];
        foreach($product->sortedValues($product->category_id) as $field){
            $chars[$field->filter->title] = $field->value;
        }

        if($product->hasDiscount()){
            $discount = $product->getNewPrice();
        }else{
            $discount = null;
            /*if($product->out_price != 0){
                $product->price = $product->out_price;
            }*/
        }

        Cart::instance('compare')->add(
            $id = $product->id,
            $title = $product->title,
            $qty = 1,
            $price = $product->out_price,

            $options = [
                'category_name' => $product->category->title,
                'excerpt' => $product->excerpt,
                'article' => $product->article,
                'thumbnail' => count($product->thumbnail) ? $product->thumbnail->first()->path : '',
                'categorySlug' => $parentCategorySlug[0]->slug.'/'.$product->category->slug,
                'productSlug' => $product->slug,
                'characteristics' => $chars,
                'discount' => $discount
            ]

            );
        return ['count' => $this->calcProductsInCompare()];
        
 
       
    }

    public function calcProductsInCompare()
    {
        Cart::instance('compare');
        return Cart::count();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function addSetOfProducts(Request $request) {

		$stock = Stock::with('uniqueProducts.thumbnail', 'uniqueProducts.category', 'uniqueProducts.relevantSale')
                        ->findOrFail($request->get('stockId'));
		
        $products = $stock->uniqueProducts;
		$sessionStockKey = 'stock_' . $stock->id; //bcrypt('stock_' . $stock->id);

		foreach ($products as $product) {

			if (str_replace(' ', '', $product->getNewPrice()) > str_replace(' ', '', $product->getStockPrice())) {
				$price = str_replace(' ', '', $product->getStockPrice());
			} else {
				$price = str_replace(' ', '', $product->hasDiscount() ? $product->getNewPrice() : $product->getPrice());
			}

			Cart::instance($sessionStockKey)->add(
				$id = $product->clone_of ?: $product->id,
				$title = $product->title,
				$qty = 1,
				$price = $price,
				$options = [
                    'stock' => $stock->id,
                    'instance' => $sessionStockKey,
					'main_in_set' => $products->first()->id,
					'excerpt' => $product->excerpt,
					'article' => $product->article,
					'thumbnail' => count($product->thumbnail) ? $product->thumbnail->first()->path : '',
					'categorySlug' => $product->category->slug,
					'productSlug' => $product->slug,
				]);
		}

		session()->put('stocks.' . $stock->id, $sessionStockKey);

		return ['count' => $this->calcProductsInCart(), 'total' => $this->calcTotalPrice()];
	}

    /**
     * @return array
     */
    public function getContent() {
        Cart::instance('main');
        return [
			'content' => Cart::content(),
			'stockProducts' => $this->getStockSets(),
			'len' => $this->calcProductsInCart(),
			'total' => $this->calcTotalPrice(),
		];
	}



    
    public function getToCompare()
    {
        Cart::instance('compare');
        $content = Cart::content();
        return $content->groupBy("options.category_name");
    }

    
    /**
     * @param Request $request
     */
    public function updateItem(Request $request) {
        //dd($request->all());
		$product = $request->get('product');
        $instance = $request->get('instance');
        $product = Cart::instance($instance)->get($product['rowId']);
		Cart::instance($instance)->update($product->rowId, $request->get('qty'));


        $productsInSet = Cart::instance($instance)->search(
            function($item) use ($product) {
                return $product->id == $item->options->main_in_set;
            }
        );

        if($productsInSet){
            foreach($productsInSet as $rowId){
                Cart::instance($instance)->update($rowId, $request->get('qty'));
            }
        }
	}

    /**
     * @param Request $request
     * @return array
     */
    public function deleteItem(Request $request) {
        $rowId = $request->get('rowId');

        $product = Cart::instance('main')->get($rowId);

        //dd($product, session('stocks'));

        if(!$product){
            foreach(session('stocks') as $instance){
                $product = Cart::instance($instance)->get($rowId);
                if($product) break;
            }
        }

        if($product->options->main_in_set == $product->id) {
            Cart::instance($product->options->instance)->destroy();
            $request->session()->forget('stocks.'.$product->options->stock);
        } else {
            Cart::instance('main')->remove($product->rowId);
        }

		return [true];
	}

    public function deleteItemFromCompare(Request $request){
        Cart::instance('compare');
        $productId = $request->get('product_id');
        $product = $this->searchCompare((int)$productId);

        //dd($product->first()->rowId);
        if($product){
            Cart::remove($product->first()->rowId);
        }
        return "OK";
    }

    /**
     * @return mixed
     */
    public function calcProductsInCart() {
		$count = 0;
        if(session('stocks')) {
            foreach (session('stocks') as $stockInstance) {
                $count += Cart::instance($stockInstance)->count();
            }
        }
        return Cart::instance('main')->count() + $count;
	}




    
    /**
     * @return mixed
     */
    public function calcTotalPrice()
    {
        $stockProductsTotal = [];
        if(session('stocks')) {
            foreach (session('stocks') as $stockInstance) {
                $stockProductsTotal[] = Cart::instance($stockInstance)->total();
            }
        }
        return (int)Cart::instance('main')->total() + array_sum($stockProductsTotal);
    }

    public function getStockSets()
    {
        $products = [];
        if(session('stocks')){
            foreach (session('stocks') as $stockInstance) {
                $products[] = Cart::instance($stockInstance)->content();
            }
        }
       return $products;
    }


    public function destroyCart()
    {
        Cart::destroy();
        if(session('stocks')){
            foreach (session('stocks') as $stockInstance) {
                Cart::instance($stockInstance)->destroy();
            }
        }
        session()->forget('stocks');
    }



}

