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

	public function updateValue($request, $id){
		return DB::table('parameter_product')->where('parameter_id', $request->parameterID)
			->where('product_id', $request->productID)->update(['parameter_value_id' => $id]);
	}

	public function getValueID($id){
		return DB::table('parameters_values')->where('id', $id)->get();
	}
}
