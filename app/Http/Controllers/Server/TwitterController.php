<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Server\ApiTwitterController;

class TwitterController extends Controller
{
    /**
     * @var
     */
    protected $auth;

    /**
     * TwitterController constructor.
     */
    public function __construct()
    {
        $this->auth = \Config::get('twitter');
    }

    /**
     * @param Request $requests
     * @return string
     */
    public function send(Request $requests){
        $text = $requests->get('text');
        $twitter = new ApiTwitterController($this->auth);
        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        $twitter->buildOauth($url, 'POST');
        if($twitter->setPostfields(['status' => $text])->performRequest()){
            return '<h3 align="center">Отправлено</h3>';
        }else{
            return '<h3 align="center">Ошибка</h3>';
        }
    }
}
