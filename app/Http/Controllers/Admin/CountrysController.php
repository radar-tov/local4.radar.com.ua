<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountrysController extends Controller
{
    public function add(){
        return view('admin.countrys.add');
    }

    public function save(Request $request, Country $country){
        return '<h3 align="center">Сохранено. ID = '.$country->findOrCreate($request->name).'</h3>';
    }

    public function get(){
        return Country::orderBy('name')->lists('name', 'id');
    }
}
