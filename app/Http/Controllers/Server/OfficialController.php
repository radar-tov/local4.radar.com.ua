<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyRequest;
use App\Services\BuyService;

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

    public function getdata(){
        if(cartItemsCount() > 0){
            return "<span class='badge badge-warning'>".cartItemsCount()."</span>";
        }else{
            return '';
        }
    }
}
