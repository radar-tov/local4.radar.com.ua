<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends AdminController
{
    public function index(){
        return view('admin.sms.index');
    }
}
