<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Online;
use Carbon\Carbon;

class OnlineController extends Controller
{
    public function getOnline(){
        $records = Online::where('updated_at', '<', Carbon::now()->subMinute(2))->get();
        if($records->count() > 0){
            foreach ($records as $record) {
                $record->delete();
            }
        }
        return Online::all()->count();
    }
}
