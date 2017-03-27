<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class ConfigController extends AdminController
{
    public function index(){

        $myConfig = Config::get('frontend');

        return view('admin.config.index')->with('myConfig', $myConfig);
    }
}
