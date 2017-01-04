<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use App\Models\ParametersValue;

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
        $param = $this->firstOrCreate($params);
        return $param->id;
	}

	public function addValue($value){
		return DB::table('parameters_values')->insertGetId($value);
	}

    public function addValueUn($values){
        //return DB::table('parameters_values')->insertGetId($value);
        $valu = ParametersValue::firstOrCreate($values);
        return $valu->id;
    }

	public function saveParamsProduct($parameter_product){
		return DB::table('parameter_product')->insert($parameter_product);
	}

	public function updateValue($request, $id){
		if(DB::table('parameter_product')->where('parameter_id', $request->parameterID)
			->where('product_id', $request->productID)->update(['parameter_value_id' => $id])){
            return true;
        }else{
            return false;
        }
	}

	public function deleteParam($paramID, $productID){
		DB::table('parameter_product')->where('parameter_id', $paramID)->where('product_id', $productID)->delete();

		if(!DB::table('parameter_product')->where('parameter_id', $paramID)->first()){
			DB::table('parameters')->where('id', $paramID)->delete();
			DB::table('parameters_values')->where('parameter_id', $paramID)->delete();
			return "<h3 align=эcenterэ>Удалён полностью.</h3>";
		}

		return "<h3 align=эcenterэ>Удалён из продукта.</h3>";
	}

}
