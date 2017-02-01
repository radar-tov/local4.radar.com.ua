<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Models\Setting;

class APIAnminController extends Controller
{
    protected $key;
    protected $client;

    public function __construct(){
        $this->key = Setting::pluck('API_key_NP')->first();
    }

    public function getAreas(){

        $client = new Client([
            'base_uri' => 'http://api.novaposhta.ua/v2.0/json/',
            'timeout'  => 2.0,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        $response = $client->post(
            'Address/getAreas',
            [
                'json' => [
                    'apiKey' => $this->key,
                    'modelName' => 'Address',
                    'calledMethod' => 'getAreas'
                ]
            ]
        );

        return $response->getBody();
    }
}
