<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LisDev\Delivery\NovaPoshtaApi2;
use App\Models\NP\Area;
use App\Models\NP\Citie;

class ApiNP extends Controller
{
    public $np;

    public function __construct()
    {
        $this->np = new NovaPoshtaApi2(env('NP_API'));
    }

    /**
     * Проверяет статус отправки по номеру
     *
     * @param Request $request
     * @return string
     */
    public function tracking(Request $request){
        return $this->np->documentsTracking($request->np_id);
    }

    /**
     * Обновляет список областей
     *
     * @return string
     */
    public function updateAreas(){
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

    /**
     * Обновляет список населённых пунктов с отделениями НП.
     *
     * @return string
     */
    public function updateCities(){
        $data = $this->np->getCities();
        foreach ($data['data'] as $tiam){
            $area = Citie::where('Description', $tiam['Description'])->first();
            if(!$area){
                $area = new Citie($tiam);
            }
            $area->Ref = $tiam['Ref'];
            $area->Description = $tiam['Description'];
            $area->DescriptionRu = $tiam['DescriptionRu'];
            $area->Area = $tiam['Area'];
            $area->Delivery1 = $tiam['Delivery1'];
            $area->Delivery2 = $tiam['Delivery2'];
            $area->Delivery3 = $tiam['Delivery3'];
            $area->Delivery4 = $tiam['Delivery4'];
            $area->Delivery5 = $tiam['Delivery5'];
            $area->Delivery6 = $tiam['Delivery6'];
            $area->Delivery7 = $tiam['Delivery7'];
            $area->PreventEntryNewStreetsUser = $tiam['PreventEntryNewStreetsUser'];
            $area->Conglomerates = serialize($tiam['Conglomerates']);
            $area->CityID = $tiam['CityID'];
            $area->save();
        }
        return 'OK';
    }
}
