<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Config;
use App\Http\Controllers\Auth\ReCaptcha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/cabinet';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'phone' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
    }

    //Переопределяем метод
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        //Для разработки
        //Site key: 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
        ////Secret key: 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
        $isCaptcha = Config::where('key', 'captcha')->first();
        if($isCaptcha->value){
            // ваш секретный ключ
            // $secret = "6LfpexcUAAAAAJEmr1veZ-1F7uzRXT8W7H8QC6UD";
            $secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
            // пустой ответ
            $response = null;
            // проверка секретного ключа
            $reCaptcha = new ReCaptcha($secret);
            $sitekey = $request->input('g-recaptcha-response');
            // if submitted check response
            if ($sitekey) {
                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $sitekey);
            }
            if ($response != null && $response->success) {
                event(new Registered($user = $this->create($request->all())));

                $this->guard()->login($user);

                return $this->registered($request, $user) ?: redirect()->back();
            } else {
                return redirect()->back()->with('message', 'Подтвердите, пожалуйста, что Вы не робот. Спасибо.')->withInput();
            }
        }else{
            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            return $this->registered($request, $user) ?: redirect()->back();
        }

    }
}