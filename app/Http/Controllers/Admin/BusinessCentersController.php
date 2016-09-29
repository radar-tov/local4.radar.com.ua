<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\BusinessCenter;

class BusinessCentersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$complexes = BusinessCenter::with("city")->simplePaginate(20);
		$citiesList = City::lists("name","id");
		if($request->ajax()) return $complexes->toArray();

		return view("admin.business-centers.index", compact("complexes", "citiesList"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		return BusinessCenter::create($request->all())->load("city");
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param Request $request
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$complex = BusinessCenter::findOrFail($id);

		$complex->update($request->all());

		return $complex->load("city");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		BusinessCenter::find($id)->delete();
	}

}
