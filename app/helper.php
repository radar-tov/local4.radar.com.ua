<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function getDiscountValue($request) {
	$discount = $request->get('discount');
	if ($discount == 0) {
		return "discount LIKE '%' ";
	}

	if ($discount == 1) {
		return 'discount = 0';
	}

	if ($discount == 2) {
		return 'discount > 0';
	}

}

function getProductStatement($product) {
	if (!isset($product->id)) {
		return "characteristic_values.product_id LIKE '%' ";
	} else {
		return "characteristic_values.product_id = {$product->id} ";
	}

}

function getFormattedDateForInput($sale) {
	$start = $sale->start_at->format('d.m.Y');
	$stop = $sale->stop_at->format('d.m.Y');

	return $start . ' - ' . $stop;
}

function hasGift($product) {
	foreach ($product->stocks as $stock) {
		foreach ($stock->products as $prod) {
			if($prod->pivot->stock_price == 0 && $stock->pivot->is_main == 1) {
				return true;
			}
		}
	}
	return false;
}

function getAppointment($product) {
	$badge = null;

	if (hasGift($product)) {
		$badge = 'present.png';
	} elseif ($product->discount > 0 or (count($product->relevantSale) && $product->relevantSale->first()->discount > 0)) {
		$badge = 'discount.png';
	} elseif ($product->is_new) {
		$badge = 'new.png';
	} elseif ($product->is_bestseller) {
		$badge = 'best-sales.png';
	} else {
		$badge = null;
	}

	return $badge;
}

function getProductPrice($product) {

}

function productHasDiscount($product) {
	if ($product->discount > 0 or $product->sale->discount > 0) {
		return true;
	}

	return false;
}

function orderItemsCount() {
    return (new \App\Http\Controllers\Admin\OrdersController())->newOrder();
}

function cartItemsCount() {
	return (new \App\Http\Controllers\Frontend\CartController())->calcProductsInCart();
}

function cartTotalPrice() {
	return (new \App\Http\Controllers\Frontend\CartController())->calcTotalPrice();
}

function destroyCart() {
	return (new \App\Http\Controllers\Frontend\CartController())->destroyCart();
}

function productInCart($product) {
	$id = $product->clone_of ?: $product->id;
	$prod = null;
	foreach ((array) session('stocks') + ['main'] as $instance) {
		$prod = Cart::instance($instance)->search(function($item) use ($id) {
            return $id == $item->id;
        });
		if ($prod) {
			break;
		}

	}

	return !!$prod;
}

 function calcProductsInCompare()
    {
        Cart::instance('compare');
        return Cart::count();
        

    }