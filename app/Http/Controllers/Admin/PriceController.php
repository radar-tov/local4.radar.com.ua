<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Mail;
use App\Models\Setting;
use PHPMailer;

class PriceController extends Controller
{
    public function download(){
        return Response::download('xls/price.xls');
    }

    public function emailUser($id){

        $user = User::find($id);

        $emailFrom = Setting::pluck('contact_email')->first();
        $auth = \Config::get('gmail');
        $mail = new PHPMailer;
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = $auth['gmail_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $auth['gmail_username'];
        $mail->Password = $auth['gmail_password'];
        $mail->SMTPSecure = $auth['gmail_secure'];
        $mail->Port = $auth['gmail_port'];
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->setFrom($emailFrom, 'Radar.com.ua');


        $body = '';
        $mail->Subject = 'Прайс от магазина Radar.com.ua';
        $mail->addAddress($user->email, $user->name);
        $mail->msgHTML($body);
        $mail->addAttachment("xls/price.xls");

        if(!$mail->send()) {
            return redirect()->back()->with(['message'=>'Ошибка']);
        } else {
            return redirect()->back();
        }
    }
}
