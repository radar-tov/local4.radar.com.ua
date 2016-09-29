<?php

namespace App\ViewDataProviders;


use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannerDataProvider {

	protected $cacheLifetime = 15;
	public static $savedBanner = null;

	public function getBanner(){
		if(!self::$savedBanner){
			self::$savedBanner = Cache::remember('Banner',$this->cacheLifetime,function(){
				return Banner::show()->orderBy('order','desc')->first();
			});
		}

		return self::$savedBanner;
	}

}