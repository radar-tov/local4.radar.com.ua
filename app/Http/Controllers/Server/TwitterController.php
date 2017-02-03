<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Server\ApiTwitterController;

class TwitterController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = \Config::get('twitter');
    }

    public function send(Request $requests){
        $text = $requests->get('text');
        $twitter = new ApiTwitterController($this->auth);
        $url = 'https://api.twitter.com/1.1/statuses/update.json';
        $twitter->buildOauth($url, 'POST');
        $twitter->setPostfields(['status' => $text])->performRequest();
    }
}
