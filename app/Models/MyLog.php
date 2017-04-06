<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyLog extends Model
{
    protected $fillable = ['token', 'page', 'ip', 'log'];
    protected $table = 'log';

    public function add($log){
        $newLog = new MyLog();
        $newLog->ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $newLog->page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        /*$newLog->token = isset( session('_token') ) ? session('_token') : '';*/
        $newLog->log = $log;
        $newLog->save();
    }
}
