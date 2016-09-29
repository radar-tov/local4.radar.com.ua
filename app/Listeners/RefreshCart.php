<?php

namespace App\Listeners;

use App\Events\UserHasLoggedIn;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class RefreshCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	/**
	 *
	 * This method will override cart content to apply discount for user
	 * Handle the event.
	 *
	 * @internal param UserHasLoggedIn $event
	 */
    public function handle()
    {
	    $qty = [];
	    $ids = [];
	    foreach (Cart::content() as $product) {
		    $ids[] = $product->id;
		    $qty[$product->id] = $product->qty;
	    }

	    Cart::destroy();

	    $products = Product::whereIn('id', $ids)->with('relevantSale','thumbnail','category')->get();

	    foreach ($products as $product) {
		    Cart::add(
			    $id = $product->id,
			    $title = $product->title,
			    $qty = $qty[$product->id],
			    $price = str_replace(' ', '', $product->hasDiscount() ? $product->getNewPrice() : $product->getPrice()),
			    $options = [
				    'excerpt' => $product->excerpt,
				    'article' => $product->article,
				    'thumbnail' => count($product->thumbnail) ? $product->thumbnail->first()->path : '',
				    'categorySlug' => $product->category->slug,
				    'productSlug' => $product->slug,
		    ]);
	    }
    }
}
