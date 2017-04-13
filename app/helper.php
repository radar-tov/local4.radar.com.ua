<?php

use Gloudemans\Shoppingcart\Facades\Cart;

/**
 * @param $request
 * @return string
 */
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

/**
 * @param $product
 * @return string
 */
function getProductStatement($product) {
	if (!isset($product->id)) {
		return "characteristic_values.product_id LIKE '%' ";
	} else {
		return "characteristic_values.product_id = {$product->id} ";
	}

}

/**
 * @param $sale
 * @return string
 */
function getFormattedDateForInput($sale) {
	$start = $sale->start_at->format('d.m.Y');
	$stop = $sale->stop_at->format('d.m.Y');

	return $start . ' - ' . $stop;
}

/**
 * @param $product
 * @return bool
 */
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

/**
 * @param $product
 * @return null|string
 */
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

/**
 * @param $product
 */
function getProductPrice($product) {

}

/**
 * @param $product
 * @return bool
 */
function productHasDiscount($product) {
	if ($product->discount > 0 or $product->sale->discount > 0) {
		return true;
	}

	return false;
}

/**
 * @return mixed
 */
function orderItemsCount() {
    return (new \App\Http\Controllers\Admin\OrdersController())->newOrder();
}

/**
 * @return int
 */
function onlineItemsCount() {
    return (new \App\Http\Controllers\Admin\OnlineController())->getOnline();
}

/**
 * @return mixed
 */
function cartItemsCount() {
	return (new \App\Http\Controllers\Frontend\CartController())->calcProductsInCart();
}

/**
 * @return mixed
 */
function cartTotalPrice() {
	return (new \App\Http\Controllers\Frontend\CartController())->calcTotalPrice();
}

/**
 *
 */
function destroyCart() {
	return (new \App\Http\Controllers\Frontend\CartController())->destroyCart();
}

/**
 * @param $product
 * @return bool
 */
function productInCart($product) {
	$id = $product->clone_of ?: $product->id;
	$prod = null;
	foreach ((array) session('stocks') + ['main'] as $instance) {
		$prod = Cart::instance($instance)->search(function($item) use ($id) {
            return $id == $item->id;
        });
		if (!$prod->isEmpty()) {
		    return true;
		    break;
		}
	}
	return false;
}

/**
 * @return float|int
 */
 function calcProductsInCompare()
 {
    Cart::instance('compare');
    return Cart::count();
}


/**
 * @param $param
 * @param string $title
 */
function xprint( $param, $title = 'Отладочная информация' )
{
    ini_set( 'xdebug.var_display_max_depth', 50 );
    ini_set( 'xdebug.var_display_max_children', 25600 );
    ini_set( 'xdebug.var_display_max_data', 9999999999 );
    if ( PHP_SAPI == 'cli' )
    {
        echo "\n---------------[ $title ]---------------\n";
        echo print_r( $param, true );
        echo "\n-------------------------------------------\n";
    }
    else
    {
        ?>
        <style>
            .xprint-wrapper {
                padding: 10px;
                margin-bottom: 25px;
                color: black;
                background: #f6f6f6;
                position: relative;
                top: 18px;
                border: 1px solid gray;
                font-size: 11px;
                font-family: InputMono, Monospace;
                width: 80%;
            }
            .xprint-title {
                padding-top: 1px;
                color: #000;
                background: #ddd;
                position: relative;
                top: -18px;
                width: 170px;
                height: 15px;
                text-align: center;
                border: 1px solid gray;
                font-family: InputMono, Monospace;
            }
        </style>
        <div class="xprint-wrapper">
        <div class="xprint-title"><?= $title ?></div>
        <pre style="color:#000;"><?= htmlspecialchars( print_r( $param, true ) ) ?></pre>
        </div><?php
    }
}

/**
 * @param $val
 * @param null $title
 *
 */
function xd( $val, $title = null )
{
    xprint( $val, $title );
    die();
}