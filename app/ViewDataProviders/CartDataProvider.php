<?php

namespace App\ViewDataProviders;


use App\Models\PaymentMethod;
use App\Models\ShipmentMethod;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartDataProvider {


	public function getContent()
	{
		return Cart::content();
	}


	public function getTotal()
	{
		return Cart::total();
	}


	public function getPaymentMethods()
	{
		return PaymentMethod::all();
	}

	public function getShipmentMethods()
	{
		return ShipmentMethod::all();
	}


	public function getToCompare()
    {

        Cart::instance('compare');

        $content = Cart::content();
        $content = $content->groupBy("options.category_name");

        return $content ;
    }

    public function search($id){
	    return Cart::search(function($item) use ($id) {
            return $id == $item->id;
        })->count();
    }

    public function searchCompare($id){
        return Cart::instance('compare')->search(function($item) use ($id) {
            return $id == $item->id;
        })->count();
    }

}