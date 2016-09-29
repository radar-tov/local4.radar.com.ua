<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Setting;
use Cache;

/**
 * Created by Igor Mazur
 * Date: 02.08.15 12:13
 */
abstract class BaseController extends  Controller
{
	/**
	 * Cache lifetime
	 * by default 15 minutes
	 * @var int
	 */
	protected $cacheLifetime = 15;

	public function __construct()
	{
		$this->loadFromCache();
	}

	/**
	 * @return void
	 */
	protected function loadFromCache()
	{
		$Settings = Cache::remember('Settings',$this->cacheLifetime,function(){
			return Setting::firstOrCreate([])->toArray();
		});

		$Banner = Cache::remember('Banner',$this->cacheLifetime,function(){
			return Banner::show()->orderBy('order','desc')->first();
		});

		view()->share('Settings',$Settings);
		view()->share('Banner',$Banner);
	}
}