<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Mockery\CountValidator\Exception;

/**
 * Created by Igor Mazur
 * Date: 06.06.15 15:16
 */
abstract class AdminController extends  Controller
{
	public function __construct()
	{
		view()->share('currentUser',Auth::user());
	}

	protected function prepareSearchQuery($query)
	{
		$query = array_filter(preg_split('/\s+/i',$query),function($v){
			return mb_strlen($v) > 2;
		});

		if(count($query)) {
			return "%" . implode('%',$query)  . "%" ;
		}

		throw new Exception('Uninformative request');

	}
}
