<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

	public $subject = 'Ссылка для сброса пароля';
	public $redirectTo = '/cabinet';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	protected function resetPassword($user, $password)
	{
		$user->password = $password;

		$user->save();

		Auth::login($user);
	}

	public function getReset($token = null)
	{
		if (is_null($token)) {
			throw new NotFoundHttpException;
		}

		return view('frontend.reset')->with('token', $token);
	}

//	public function redirectPath()
//	{
//		if (property_exists($this, 'redirectPath')) {
//			return $this->redirectPath;
//		}
//
//		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
//	}
}
