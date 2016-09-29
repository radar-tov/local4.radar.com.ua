<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ShipmentMethod;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return Response
	 */
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')
	        ->with('user', 'products', 'payment_method', 'shipping_method')
	        ->where(function($order) use($request){
		        $order->where('id', $request->get('search') ?: 'LIKE', '%')
			            ->orWhereHas('user', function($user) use($request){
				            $user->where('name', 'LIKE', '%'.$request->get('search').'%')
					            ->orWhere('email', 'LIKE', '%'.$request->get('search').'%')
					            ->orWhere('city', 'LIKE', '%'.$request->get('search').'%')
					            ->orWhere('country', 'LIKE', '%'.$request->get('search').'%');
			            });
	        })
	        ->where('status_id', $request->get('status') ?: 'LIKE', '%')
	        ->paginate(20);
	    return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $order = Order::find($id);
	    $payments = PaymentMethod::lists('title', 'id');
	    $shipping = ShipmentMethod::lists('title', 'id');

	    return view('admin.orders.show', compact('order','payments', 'shipping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        Order::find($id)->update($request->all());

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.orders.index');
	    }

	    return redirect()->route('dashboard.orders.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
	    return redirect()->back();
    }
}
