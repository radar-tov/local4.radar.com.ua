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

	public function getValues(){
		return $this->hasMany('App\Models\ParametersValue');
	}

	public function add($params){
		return DB::table('parameters')->insertGetId($params);
	}

	public function addValue($value){
		return DB::table('parameters_values')->insertGetId($value);
	}

	public function saveParamsProduct($parameter_product){
		return DB::table('parameter_product')->insert($parameter_product);
	}
}
