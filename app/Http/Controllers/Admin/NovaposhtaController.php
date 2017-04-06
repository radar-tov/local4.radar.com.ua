<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class NovaposhtaController extends AdminController
{
    public function index(){
        return view('admin.novaposhta.index');
    }
}
