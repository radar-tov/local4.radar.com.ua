<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfficialController extends ServerController
{
    public function myTemplate(){
        return view('mail/zakaz1click');
    }
}
