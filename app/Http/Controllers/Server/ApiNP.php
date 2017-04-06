<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LisDev\Delivery\NovaPoshtaApi2;
use App\Models\NP\Area;

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

    public function updateAreas(){
        //return $this->np->getAreas();
        $data = $this->np->getAreas();
        foreach ($data['data'] as $tiam){
            $area = Area::where('Description', $tiam['Description'])->first();
            if($area){
                $area->Description = $tiam['Description'];
                $area->Ref = $tiam['Ref'];
                $area->AreasCenter = $tiam['AreasCenter'];
                $area->save();
            }else{
                $area = new Area($tiam);
                $area->save();
            }
        }
        return 'OK';
    }
}
