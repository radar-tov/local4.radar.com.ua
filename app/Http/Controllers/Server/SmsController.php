<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoapClient;

class SmsController extends Controller
{
    /**
     * @var SoapClient
     */
    public $client;

    /**
     * @var
     */
    protected $login;

    /**
     * @var
     */
    protected $password;

    /**
     * SmsController constructor.
     */
    public function __construct()
    {
        $this->client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
        // Данные авторизации
        $auth = [
            'login' => \Config::get('sms.login'),
            'password' => \Config::get('sms.password')
        ];
        // Авторизируемся на сервере
        $this->client->Auth($auth);
    }

    /**
     * @return string
     */
    public function getBalance(){
        try{
            // Получаем количество доступных кредитов
            $result = $this->client->GetCreditBalance();
            return $result->GetCreditBalanceResult . PHP_EOL;
        } catch (Exception $e) {
            return 'Ошибка: ' . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function send(Request $request){
        try{
            if($request->get('phone') != ''){
                $ar = [' ', '-', '-', '(', ')', '+38'];
                $phone = trim ($request->get('phone'));
                foreach ($ar as $v){
                    $phone = str_replace($v, '', $phone);
                }
                $ar = str_split($phone);
                $phone = '+38'.$ar[0].$ar[1].$ar[2].$ar[3].$ar[4].$ar[5].$ar[6].$ar[7].$ar[8].$ar[9];
            }else{
                throw new \Exception("Нет номера телефона");
            }


            $sms = [
                'sender' => \Config::get('sms.sender'),
                'destination' => $phone,
                'text' => $request->get('text')
            ];
            $result = $this->client->SendSMS($sms);

            // Выводим результат отправки.
            return $result->SendSMSResult->ResultArray[0] . PHP_EOL;
        } catch (\Exception $e) {
            return 'Ошибка: ' . $e->getMessage() . PHP_EOL;
        }

    }

    /**
     * @param Request $request
     * @return string
     */
    public function sendNpId(Request $request)
    {
        try{
            if(!$request->get('np_id') or $request->get('np_id') == '')
            {
                throw new \Exception("Нет номера декларации.");
            }

            if($request->get('phone') and $request->get('phone') != ''){
                $ar = [' ', '-', '-', '(', ')', '+38'];
                $phone = trim ($request->get('phone'));
                foreach ($ar as $v){
                    $phone = str_replace($v, '', $phone);
                }
                $ar = str_split($phone);
                $phone = '+38'.$ar[0].$ar[1].$ar[2].$ar[3].$ar[4].$ar[5].$ar[6].$ar[7].$ar[8].$ar[9];
            }else{
                throw new \Exception("Нет номера телефона");
            }

            $text = "Ваш заказ отправлен Новой почтой № ТТН " . $request->get('np_id');

            $sms = [
                'sender' => \Config::get('sms.sender'),
                'destination' => $phone,
                'text' => $text
            ];
            
            $result = $this->client->SendSMS($sms);

            // Выводим результат отправки.
            $message = $result->SendSMSResult->ResultArray[0] . PHP_EOL;

        } catch (\Exception $e) {
            $message = 'Ошибка: ' . $e->getMessage();
        } finally {
            return $message;
        }
    }

/*    public function sendMass(Request $request){
        $sms = [
            'sender' => \Config::get('sms.sender'),
            'destination' => $request->phone,
            'text' => $request->text
        ];
        $result = $this->client->SendSMS($sms);

        // Выводим результат отправки.
        return $result->SendSMSResult->ResultArray[0] . PHP_EOL;
    }*/
}
