<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class OrderedProductsController
 * @package App\Http\Controllers\Admin
 */
class OrderedProductsController extends Controller
{
	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function getProductsByOrder(Request $request)
	{
		OrderedProduct::where('order_id', $request->get('order_id'))->get();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
	    $product = OrderedProduct::find($id);
	    $order = Order::find($product->order_id);

	    $product->delete();

		$order->load('products');
	    $total = $order->getTotal();

	    return $total;
    }
}
