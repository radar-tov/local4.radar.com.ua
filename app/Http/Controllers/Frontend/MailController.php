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
		$messageTo = Setting::pluck('feedback_email');

		if(empty($messageTo)) {
			throw new Exception("Feedback email is empty! Please set email.");
		}

		$this->messageTo = $messageTo;
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
		$data['subject'] = 'Новое оповещение';
		$data['_view'] = 'emails.'.array_get($data,'_view');

		$this->sendMessage($data);

		return redirect()->back()->withMessage('Ваше письмо отправлено!');
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	protected function sendMessage(array $data)
	{
		Mail::send(array_get($data,'_view','not.found.view'), $data , function($message) use ($data)
		{
			$message->from(array_get($data,'email','radar.tov@gmail.com'), 'Radar');

			$message->to($this->messageTo)->subject(array_get($data,'subject',''));
		});

//		$result = Mail::send('mail.contact', ['data' => $date], function($message) use ($data){
//
//			$mail_admin = env('MAIL_ADMIN');
//
//			$message->from($data['email'], $data['name']);
//			$message->to($mail_admin, 'Mr. Admin')->subject('Question');
//
//		});
//
//		if($result){
//			return true;
//		}else{
//			return false;
//		}

		return true;
	}
}
