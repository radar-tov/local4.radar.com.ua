<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

/**
 * Class FilterController
 * @package App\Http\Controllers\Frontend
 */
class FilterController extends Controller
{
	/**
	 * @var array
	 */
	private $allowedFields = [
		"area_id", "business_center_id", "house_class", "life_complex_id", "metro_id", "price",
		"renter", "rooms", "style_id", "town_id", "for_rent"
	];


	/**
	 * @param Request $request
	 */
	public function filter(Request $request)
	{
		$query = $this->prepareQuery($request->only($this->allowedFields));
		$accommodations =
			Accommodation::	where("category_id", $request->get("category"))
				->where("price", "<", $request->get("price"))
				->whereBetween("space", $request->get("space"))
				->whereRaw($query ?: "id")
				->paginate(15);

		return $accommodations;

		//exit;
		//dd($accommodations->toArray());
		return Response::json(view("frontend.partials.filtered_accommodations",
												compact("accommodations"))->render());
	}

	/**
	 * @param $data
	 * @return string
	 */
	public function prepareQuery($data)
	{
//		dd($data);
		$query = "";
		foreach($data as $fieldName => $value){

			if(count($value) && is_array($value)){

				foreach($value as $key => $val) {
					$value[$key] = "'".$val."'";
				}
				$inStatement = implode(",", array_flatten($value));
				!$query ?: $query .= "AND";

				if($fieldName == "rooms" && in_array(5, $data[$fieldName])){
					$query .= "(rooms IN($inStatement) OR "."rooms >= 5)";
				} else {
					$query .= " $fieldName IN($inStatement) ";
				}
			}

		}
//		dd($query);
		return $query;
	}
	
}