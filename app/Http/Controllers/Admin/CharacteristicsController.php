<?php

namespace App\Http\Controllers\Admin;

use App\Models\Characteristic;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

/**
 * Class CharacteristicsController
 * @package App\Http\Controllers\Admin
 */
class CharacteristicsController extends AdminController
{
	/**
	 * @param Request $request
	 * @return static
	 */
	public function createCharacteristic(Request $request)
	{
//		dd($request->all());
		$field = Characteristic::create($request->all());
		return $field;
    }

	/**
	 * @param Request $request
	 * @param $id
	 */
	public function updateCharacteristic(Request $request, $id)
	{
		$field = Characteristic::find($id);
		$field->update($request->all());
		return $field;
	}

	/**
	 * @param $id
	 */
	public function deleteCharacteristic($id)
	{
		Characteristic::destroy($id);
	}

	/**
	 * @param $productId
	 * @param Request $request
	 * @return mixed
	 */
	public function getCharacteristicsForCategory($productId, Request $request)
	{
		$product = Product::find($productId);
		if($product){
			$fields = Characteristic::forUpdate($request->get('category_id'), $product)->get();
		} else {
			$fields = Characteristic::where('category_id', $request->get('category_id'))->get();
		}

		return $fields;
	}


	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function getCharacteristics(Request $request)
	{
		$filter =  Filter::whereNotIn('id', $request->get('ids') ?: [0])->get();

//		$filter = $filter->map(function($filter){
//			$filter->pivot = new \stdClass();
//			$filter->pivot->is_filter = 0;
//		});
//		dd($filter);
		return $filter;
//		return Characteristic::whereNotIn('id', $request->get('ids') ?: [0])->get();
	}
}
