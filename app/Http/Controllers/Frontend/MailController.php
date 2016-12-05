<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DaveJamesMiller\Breadcrumbs\Exception;
use Illuminate\Http\Request;
use Mail;
use App\Models\Setting;
use Symfony\Component\Process\Exception\LogicException;

class MailController extends Controller
{
	protected $messageTo;

	public function __construct()
	{
		$emailTo = Setting::pluck('feedback_email');
		$emailFrom = Setting::pluck('contact_email');

		if(empty($emailTo or $emailFrom)) {
			throw new Exception("Feedback email is empty! Please set email.");
		}

		$this->emailTo = $emailTo;
		$this->emailFrom = $emailFrom;
	}

	public function mailMe(Request $request)
	{

//		$messages = [
//			'required' => "Поле :attribute обязательно к заполнению.",
//			'email' => "Поле :attribute должно соответствовать email адресу."
//		];
//
//		$this->validate($request, [
//				'name' 	=> 'required|max:255',
//				'email' => 'required|email'
//		], $messages);


		$data = $request->all();
		//dd($data);
		//
		//Тема сообщения
		if($data['_view'] == 'contact'){
			$data['subject'] = 'Новое оповещение из формы обратной связи.';
			$message = 'Ваше письмо отправлено!';
		}elseif($data['_view'] == 'callback'){
			$data['subject'] = 'Заказ обратного звонка.';
			$message = 'Спасибо, мы обязательно с Вами свяжемся.';
		}elseif($data['_view'] == 'skidka'){
			$data['subject'] = 'Запрос на получение скидки.';
			$message = 'Ваш запрос расматривается. Мы обязательно с Вами свяжемся.';
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

		$this->sendMessage($data);

		return redirect()->back()->withMessage($message);
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
}
