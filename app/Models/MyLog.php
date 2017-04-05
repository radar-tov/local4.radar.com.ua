<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyLog extends Model
{
    protected $fillable = ['token', 'page', 'ip', 'log'];
    protected $table = 'log';

    public function add($log){
        $newLog = new MyLog();
        $newLog->ip = $_SERVER['REMOTE_ADDR'];
        $newLog->page = $_SERVER['HTTP_REFERER'];
        $newLog->token = session('_token');
        $newLog->log = $log;
        $newLog->save();
    }
}
