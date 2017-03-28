<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends AdminController
{
    public function index(){
        $myConfigs = Config::all();
        //dd($myConfig);
        return view('admin.config.index')->with('myConfigs', $myConfigs);
    }

    public function isCheckboxConfig($request, $checkbox, $name)
    {
        if (isset($checkbox) && $checkbox == 'on') {
            $request->merge([$name => true]);
        } else {
            $request->merge([$name => false]);
        }
        return $request;
    }

    public function update(Request $request){
        $request = $this->isCheckboxConfig($request, $request->captcha, 'captcha');

        foreach ($request->all() as $key => $value){
            if($key != '_token'){
                $con = Config::where('key', $key)->first();
                if($con){
                    $con->update(['value' => $value]);
                }else{
                    $config = new Config;
                    $config->key = $key;
                    $config->value = $value;
                    $config->save();
                }
            }
        }
    }
}
