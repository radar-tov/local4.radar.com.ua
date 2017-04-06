<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyRequest;
use App\Services\BuyService;
use App\Models\Order;
use App\Models\Online;
use Carbon\Carbon;
use App\Models\MyLog;

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

        return redirect()->route('orders.index');
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

        $records = Online::where('updated_at', '<', Carbon::now()->subMinute(5))->get();
        if($records->count() > 0){
            foreach ($records as $record) {
                $record->delete();
            }
        }
        $online = Online::all();
        if($online->count() > 0){
            $data['online'] = "<span class='badge badge-danger'>".$online->count()."</span>";
        }else{
            $data['online'] = '';
        }

        return $data;
    }

    public function getonline(){
        $online = Online::all();
        if($online->count() > 0){
            $data['online'] = $online;
        }else{
            $data['online'] = '';
        }

        $records = MyLog::where('created_at', '<', Carbon::now()->subHour(1))->get();
        if($records->count() > 0){
            foreach ($records as $record) {
                $record->delete();
            }
        }

        $log = MyLog::orderBy('created_at', 'DESC')->paginate(50);
        if($log->count() > 0){
            $data['log'] = $log;
        }else{
            $data['log'] = '';
        }

        return $data;
    }
}
