<?php

namespace App\Services;


use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * Class BuyService
 * @package App\Services
 */
class BuyService {


	/**
	 * @var
	 * Auth user or new user
	 */
	public $user;


	/**
	 * @var
	 */
	protected $order;


	/**
	 * @param Request $request
	 *
	 * Register new order
	 */
	public function registerOrder(Request $request)
	{
		$this->setUser($request);
		$this->createNewOrder($request);
		$this->attachProductsToOrder();
		$this->sendNotifications();
		
		return $this->order;
	}


	/**
	 * @param Request $request
	 * @return User
	 *
	 * Get Auth user or create new with guest role_id
	 */
	public function setUser(Request $request)
	{
		if(Auth::check()){
			$this->user = Auth::user();
			return;
		}

		$user = new User();
		$user->email = $request->get('email');
		$user->name = $request->get('name');
		$user->phone = $request->get('phone');
		$user->city = $request->get('city');
		$user->role_id = User::GUEST_ID;
		$user->save();

		$this->user = $user;
	}


	/**
	 * @param $request
	 *
	 * Create new order and set $this->order
	 */
	public function createNewOrder($request)
	{
		$order = Order::create([
			'user_id' => $this->user->id,
			'total' => Cart::total(),
			'payment_method_id' => $request->get('payment'),
			'shipment_method_id' => $request->get('shipment'),
			'status_id' => Order::STATUS_NEW,
			'note' => $request->get('note') ?: '',
		]);

		$this->order = $order;
	}


	/**
	 * Create OrderedProduct objects and
	 * attaches them to created order
	 * and apply discount if exists
	 */
	public function attachProductsToOrder()
	{
		// dd(session())
        foreach( (array) session('stocks') + ['main'] as $instance){

            foreach(Cart::instance($instance)->content() as $boughtProduct){
            	
        		$product = Product::find($boughtProduct->id);
				OrderedProduct::create([
					'product_id' => $product->id,
					'title' => $product->title,
					'article' => $product->article,
					'qty' => $boughtProduct->qty,
					'price_without_discount' => $product->out_price,
					'price' => str_replace(' ', '', $boughtProduct->price),
					'total_price' => str_replace(' ', '', $boughtProduct->price) * $boughtProduct->qty,
					'order_id' => $this->order->id,
	                'stock' => !!$boughtProduct->options->stock,
					'applied_discount' => $product->getDiscount()
				]);
            }
        }
	}

	/**
	 * Send notification about new order
	 * to customer and admin
	 */
	public function sendNotifications()
	{
		// email for admin
		//dd($this->user);
        if($this->user->email){
            Mail::send('emails.invoice', [
                'order' => $this->order->load('products','payment_method','shipping_method'), 'user' => $this->user
            ],
            function($message)
            {
                $message->from(array_get(Setting::firstOrCreate([])->toArray(),'contact_email'), 'Radar');
                $message->to($this->user->email)->subject('Спасибо за покупку!');
            });
        }
		Mail::send('emails.admin_invoice', [
			'order' => $this->order->load('products','payment_method','shipping_method'), 'user' => $this->user
		],
		function($message)
		{
			$message->from(array_get(Setting::firstOrCreate([])->toArray(),'contact_email'), 'Radar');
			$message->to(array_get(Setting::firstOrCreate([])->toArray(),'feedback_email'))->subject('Новый заказ!');
		});
	}


	public function validate(Request $request)
	{
		$validator = Validator::make($request->all(), [
			/*'email' => 'unique:users|required|email',
			'city' => 'required',*/
			'phone' => 'required',
			'name' => 'required'
		]);
		return $validator;
	}

}