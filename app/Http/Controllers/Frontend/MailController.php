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
	protected $messageTo;

	public function __construct()
	{
		$emailTo = Setting::pluck('feedback_email')->first();
		$emailFrom = Setting::pluck('contact_email')->first();

		if(empty($emailTo or $emailFrom)) {
			throw new Exception("Feedback email is empty! Please set email.");
		}

		$this->emailTo = $emailTo;
		$this->emailFrom = $emailFrom;
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

	/**
	 * @param array $data
	 * @return bool
	 */
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

	public function oneclick(Request $request){



	    $data = [
	        'title' => $request->title,
            'id' => $request->id,
            'phone' => $request->phone,
        ];

        $body = view('mail/zakaz1click', $data)->render();

	    $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '8818383@gmail.com';
        $mail->Password = 'slmR161716';
        /*$mail->SMTPSecure = 'ssl';
        $mail->Port = 465;*/
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('8818383@gmail.com', 'Администратор сайта Radar.com.ua');
        $mail->addAddress('radar.tov@gmail.com', 'Администратору сайта Radar.com.ua');
        $mail->Subject = 'Заказ в 1 клик';
        $mail->isHTML(true);
        $mail->msgHTML($body);
        $mail->addAttachment("frontend/images/logo.png");

        if(!$mail->send()) {
            echo "<h3 align='center'>Извините, произошла ошибка. Сообщение не отправлено.</h3>";
            /*echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;*/
        } else {
//            echo 'Message has been sent';
            echo "<h3 align='center'>Ваша заявка принята. В ближайшее время с Вами свяжутся. Спасибо.</h3>";
        }
    }
}
