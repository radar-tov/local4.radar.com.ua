<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DaveJamesMiller\Breadcrumbs\Exception;
use Illuminate\Http\Request;
use Mail;
use App\Models\Setting;
use Symfony\Component\Process\Exception\LogicException;
use PHPMailer;

class MailController extends Controller
{
	protected $emailTo;
    protected $emailFrom;
    protected $auth;
    protected $mail;

	public function __construct()
	{
        $this->emailTo = Setting::pluck('feedback_email')->first();
        $this->emailFrom = Setting::pluck('contact_email')->first();

		if(empty($this->emailTo or $this->emailFrom)) {
			throw new Exception("Feedback email is empty! Please set email.");
		}

        $this->auth = \Config::get('gmail');

        $this->mail = new PHPMailer;
        //$this->mail->SMTPDebug = 3;
        $this->mail->isSMTP();
        $this->mail->Host = $this->auth['gmail_host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->auth['gmail_username'];
        $this->mail->Password = $this->auth['gmail_password'];
        $this->mail->SMTPSecure = $this->auth['gmail_secure'];
        $this->mail->Port = $this->auth['gmail_port'];
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isHTML(true);
        $this->mail->setFrom($this->emailFrom, 'Radar.com.ua');
	}

	public function oneclick(Request $request){

        $messages = [
            'phone.required' => "Поле ТЕЛЕФОН обязательно к заполнению.",
            'phone.min' => "Поле ТЕЛЕФОН не может быть менее 10 символов.",
        ];

        $this->validate($request, [
            'phone' => 'required|min:10',
        ], $messages);

	    $data = [
	        'title' => $request->title,
            'id' => $request->id,
            'phone' => $request->phone,
        ];

        $body = view('mail/zakaz1click', $data)->render();

        $this->mail->Subject = 'Заказ в 1 клик';
        $this->mail->addAddress($this->emailTo, 'Администратору сайта Radar.com.ua');
        $this->mail->msgHTML($body);
        //$this->mail->addAttachment("frontend/images/logo.png");

        if(!$this->mail->send()) {
            echo "<h3 align='center'>Извините, произошла ошибка. Сообщение не отправлено.</h3>";
        } else {
            echo "<h3 align='center'>Ваша заявка принята. В ближайшее время с Вами свяжутся. Спасибо.</h3>";
        }
    }

    public function contact(Request $request){

        $messages = [
            'name.required' => "Поле ИМЯ обязательно к заполнению.",
            'name.max' => "Поле ИМЯ не может быть боее 255 символов.",
            'name.min' => "Поле ИМЯ не может быть менее 3 символов.",
            'email.required' => "Поле Email обязательно к заполнению.",
            'comment.required' => "Поле КОМЕНТАРИИ обязательно к заполнению.",
        ];

        $this->validate($request, [
            'name' 	=> 'required|max:255|min:3',
            'email' => 'required|email',
            'comment' => 'required'
        ], $messages);

	    $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment
        ];

        $body = view('mail/contact', $data)->render();

        $this->mail->Subject = 'Сообщение из формы обратной связи.';
        $this->mail->addAddress($this->emailTo, 'Администратору сайта Radar.com.ua');
        $this->mail->msgHTML($body);
        //$this->mail->addAttachment("frontend/images/logo.png");

        if(!$this->mail->send()) {
            $message = "Извините, произошла ошибка. Сообщение не отправлено.";
        } else {
            $message = "Ваше письмо отправлено!. В ближайшее время с Вами свяжутся. Спасибо.";
        }

        $request->session()->put('from_otvet', 'contact');
        $request->session()->put('otvet', $message);
        $request->session()->save();

        return redirect()->back();
    }

    public function callback(Request $request){

        $messages = [
            'name.required' => "Поле ИМЯ обязательно к заполнению.",
            'name.max' => "Поле ИМЯ не может быть боее 255 символов.",
            'name.min' => "Поле ИМЯ не может быть менее 3 символов.",
            'phone.required' => "Поле ТЕЛЕФОН обязательно к заполнению.",
            'phone.min' => "Поле ТЕЛЕФОН не может быть менее 10 символов."
        ];

        $this->validate($request, [
            'name' 	=> 'required|max:255|min:3',
            'phone' => 'required|min:10'
        ], $messages);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone
        ];

        $body = view('mail/callback', $data)->render();

        $this->mail->Subject = 'Заказ обратного звонка';
        $this->mail->addAddress($this->emailTo, 'Администратору сайта Radar.com.ua');
        $this->mail->msgHTML($body);
        //$this->mail->addAttachment("frontend/images/logo.png");

        if(!$this->mail->send()) {
            echo "<h3 align='center'>Извините, произошла ошибка. Сообщение не отправлено.</h3>";
        } else {
            echo "<h3 align='center'>Ваша заявка принята. В ближайшее время с Вами свяжутся. Спасибо.</h3>";
        }
    }

    public function skidka(Request $request){

        $messages = [
            'name.required' => "Поле ИМЯ обязательно к заполнению.",
            'name.max' => "Поле ИМЯ не может быть боее 255 символов.",
            'name.min' => "Поле ИМЯ не может быть менее 3 символов.",
            'phone.required' => "Поле ТЕЛЕФОН обязательно к заполнению.",
            'phone.min' => "Поле ТЕЛЕФОН не может быть менее 10 символов."
        ];

        $this->validate($request, [
            'name' 	=> 'required|max:255|min:3',
            'phone' => 'required|min:10'
        ], $messages);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment
        ];

        $body = view('mail/skidka', $data)->render();

        $this->mail->Subject = 'Заказ скидки.';
        $this->mail->addAddress($this->emailTo, 'Администратору сайта Radar.com.ua');
        $this->mail->msgHTML($body);
        //$this->mail->addAttachment("frontend/images/logo.png");

        if(!$this->mail->send()) {
            echo "<h3 align='center' class='res'>Извините, произошла ошибка. Сообщение не отправлено.</h3>";
        } else {
            echo "<h3 align='center' class='res'>Ваша заявка принята. В ближайшее время с Вами свяжутся. Спасибо.</h3>";
        }

    }


    public function mailMe(Request $request)
    {
        $data = $request->all();
        if($data['_view'] == 'callback'){
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению.",
                'phone' => "Поле :attribute обязательно к заполнению."
            ];

            $this->validate($request, [
                'name' 	=> 'required|max:255',
                'phone' => 'required|max:255'
            ], $messages);
        }

        if($data['_view'] == 'skidka'){
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению.",
                'email' => "Поле :attributeдолжно быть электронным адресом."
            ];

            $this->validate($request, [
                'name' 	=> 'required|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|email',
                'comment' => 'required|max:255'
            ], $messages);
        }

        if($data['_view'] == 'oneclick'){
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению."
            ];

            $this->validate($request, [
                'phone' => 'required|max:255'
            ], $messages);
        }






        //Тема сообщения
        if($data['_view'] == 'contact'){
            $data['subject'] = 'Новое оповещение из формы обратной связи.';
            $message = 'Ваше письмо отправлено!';
        }elseif($data['_view'] == 'callback'){
            $data['subject'] = 'Заказ обратного звонка.';
            $message = '<h3 align="center">Спасибо, мы обязательно с Вами свяжемся.</h3>';
        }elseif($data['_view'] == 'skidka') {
            $data['subject'] = 'Запрос на получение скидки.';
            $message = '<h3 align="center">Ваш запрос расматривается. Мы обязательно с Вами свяжемся.</h3>';
        }elseif($data['_view'] == 'oneclick') {
            $data['subject'] = 'Покупка в 1 клик.';
            $message = '<h3 align="center">Спасибо за покупку. Мы обязательно с Вами свяжемся.</h3>';
        }else{

        }

        if(empty($data['phone'])){
            $data['phone'] = 'Не указан.';
        }
        if(empty($data['comment'])){
            $data['comment'] = 'Не указан.';
        }
        if(empty($data['email'])){
            $data['email'] = 'Не указан.';
        }
        if(empty($data['name'])){
            $data['name'] = 'Не указан.';
        }

        $this->sendMessage($data);

        if($data['_view'] == 'callback'){
            return response($message);
            exit;
        }

        if($data['_view'] == 'skidka'){
            return response($message);
            exit;
        }

        if($data['_view'] == 'oneclick'){
            return response($message);
            exit;
        }

        $request->session()->put('from_otvet', $data['_view']);
        $request->session()->put('otvet', $message);
        $request->session()->save();

        return redirect()->back();
    }

    protected function sendMessage(array $data)
    {
        $result = Mail::send('mail.contact', ['data' => $data] , function($message) use ($data)
        {
            //dd($this->emailFrom, $this->messageTo);
            $message->from($this->emailFrom, 'Интернет магазин Radar');
            $message->to($this->emailTo, 'Mr. Admin')->subject($data['subject']);//->subject(array_get($data,'subject',''))
        });

//		$result = Mail::send('mail.contact', ['data' => $date], function($message) use ($data){
//
//			$mail_admin = env('MAIL_ADMIN');
//
//			$message->from($data['email'], $data['name']);
//			$message->to($mail_admin, 'Mr. Admin')->subject('Question');
//
//		});

        if($result){
            return true;
        }else{
            return false;
        }

        return true;
    }
}
