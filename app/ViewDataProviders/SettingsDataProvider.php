<?php

namespace App\ViewDataProviders;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsDataProvider {

	protected $cacheLifetime = 15;
	public static $savedSettings = null;

	public function getSettings(){

		if(!self::$savedSettings){
			self::$savedSettings = Cache::remember('Settings',$this->cacheLifetime,function(){
				return Setting::firstOrCreate([])->toArray();
			});
		}

		return self::$savedSettings;
	}


	public function getAgreement()
	{
		$settings = Setting::select(['agreement'])->first();
		if(!empty($settings)) return $settings->agreement;
 	}

}