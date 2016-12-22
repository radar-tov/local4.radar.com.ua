<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Parameter extends Eloquent
{
	protected $fillable = [
		'title',
		'slug',
		'category_id',
		'brand_id',
		'created_at',
		'updated_at'
	];

	public function values()
	{
		return $this->hasMany('App\Models\ParametersValue');
	}

	public function add($params){

		if(DB::table('parameters')->insert($params)){
			return true;
		}else{
			return false;
		}
	}

	public function saveParamsProduct($params){
		if(DB::table('parameter_product')->insert($params)){
			return true;
		}else{
			return false;
		}
	}
}
