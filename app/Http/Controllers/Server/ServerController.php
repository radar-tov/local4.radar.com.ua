<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Auth;
use Mockery\CountValidator\Exception;

abstract class ServerController extends  Controller
{
    /**
     * ServerController constructor.
     */
    public function __construct()
    {
        view()->share('currentUser',Auth::user());
    }

    /**
     * @param $query
     * @return string
     */
    protected function prepareSearchQuery($query)
    {
        $query = array_filter(preg_split('/\s+/i',$query),function($v){
            return mb_strlen($v) > 2;
        });

        if(count($query)) {
            return "%" . implode('%',$query)  . "%" ;
        }

        throw new Exception('Uninformative request');

    }
}
