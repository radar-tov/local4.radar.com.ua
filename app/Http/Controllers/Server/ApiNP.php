<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LisDev\Delivery\NovaPoshtaApi2;

class ApiNP extends Controller
{
    public $np;

    public function __construct()
    {
        $this->np = new NovaPoshtaApi2(env('NP_API'));
    }

    //59000249176580
    public function tracking(Request $request){
        return $this->np->documentsTracking($request->np_id);
    }

    public function getAllAreas(){
        return $this->np->getAreas();
    }
}
