<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyRequest;
use App\Services\BuyService;
use App\Models\Order;

class OfficialController extends ServerController
{
    public function myTemplate(){
        return view('mail/zakaz1click');
    }

    public function addZakaz(BuyRequest $request, BuyService $buyService){
        //dd($request->all());

        if($request->has('ones') && $buyService->validate($request)->fails())
            return redirect()->back()->withErrors($buyService->validate($request))->withInput();

        $order = $buyService->registerOrderAdmin($request);

        destroyCart();

        return redirect()->route('dashboard.orders.index');
    }

    public function getdata(Order $order){
        if(cartItemsCount() > 0){
            $data['cart'] = "<span class='badge badge-warning'>".cartItemsCount()."</span>";
        }else{
            $data['cart'] = '';
        }

        $order = $order->getNewOrder();
        if($order > 0){
            $data['order'] = "<span class='badge badge-danger'>".$order."</span>";
        }else{
            $data['order'] = '';
        }

        return $data;
    }
}
