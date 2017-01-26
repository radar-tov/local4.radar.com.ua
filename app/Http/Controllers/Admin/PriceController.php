<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Mail;
use App\Models\Setting;

class PriceController extends Controller
{
    public function download(){
        return Response::download('xls/price.xls');
    }

    public function emailUser($id){

        $user = User::find($id);
        $datatext = [
            'username' => $user->name
        ];

        $data =[
            'to' => $user->email,
            'name' => $user->name,
            'path' => 'xls/price.xls',
            'from' => Setting::pluck('contact_email')->first()
        ];

        dump($data);

        Mail::send('emails.price', ['data' => $datatext] , function($message) use ($data)
        {
            $message->from($data['from'], 'Интернет магазин Radar');
            $message->to($data['to'], $data['name'])->subject('Прайс от магазина Radar.com.ua');
            //$message->attach($data['path']);
        });
        return redirect()->back();
    }
}
