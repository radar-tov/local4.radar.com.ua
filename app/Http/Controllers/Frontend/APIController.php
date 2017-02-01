<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Models\Setting;

class APIController extends Controller
{
    protected $key;

    public function __construct(){
        $this->key = Setting::pluck('API_key_NP')->first();
    }
}
