<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\FilterValues\CreateRequest;
use App\Http\Requests\FilterValues\UpdateRequest;
use App\Models\FilterValue;
use App\Models\Filter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class FiltersValuesController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param FilterValue $filterValue
	 * @param $filterId
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request, FilterValue $filterValue, $filterId = 0)
	{
		if($request->ajax()) return FilterValue::groupBy('value')->lists('value');
		return $filterValue->where('filter_id',$filterId)->orderBy('id','desc')->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param FilterValue $filterValue
	 * @param $filterId
	 * @return Response
	 * @internal param int $id
	 */
	public function show(FilterValue $filterValue, $filterId)
	{
		return $filterValue->where('filter_id',$filterId)->orderBy('order','desc')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Filter $filter
	 * @return Response
	 */
	public function create(Filter $filter)
	{
		return view('admin.filter-values.create')->withFilters($filter->lists('title','id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateRequest $request
	 * @param FilterValue $values
	 * @return mixed
	 */
	public function store(CreateRequest $request, FilterValue $values)
	{
		return $values->create($request->all());

//		return redirect()->route('dashboard.filter-values.edit',[$filterValue->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param FilterValues $values
	 * @param Filter $filter
	 * @param  int $id
	 * @return Response
	 */
	public function edit(FilterValues $values, Filter $filter, $id)
	{
		$filterValue = $values->findOrFail($id);
		$filters = $filter->lists('title','id');

		return view('admin.filter-values.edit',compact('filterValue','filters'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateRequest $request
	 * @param FilterValues $values
	 * @param  int $id
	 * @return Response
	 */
	public function update(UpdateRequest $request, FilterValue $values, $id)
	{
		return ['success'=>true,$values->findOrFail($id)->update($request->all())];

//		return redirect()->route('dashboard.filter-values.edit',[$id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param FilterValue $values
	 * @param  int $id
	 * @return mixed
	 */
	public function destroy(FilterValue $values, $id)
	{
		try{
			$values->findOrFail($id)->delete();
		} catch(ModelNotFoundException $e) {
			return ['success'=>false,'message'=>$e->getMessage()];
		}

		return ['success'=>true];
	}

	public function fetchByFilter(FilterValue $value, $filterId)
	{
		return $value->where('filter_id',$filterId)->orderBy('order')->get();
	}

	public function order(Request $request, FilterValue $value)
	{
        foreach($request->get('serialized') as $order=>$val)
        {
			$value->find($val['id'])->update(['order'=>$order]);
        }

		return ['success'=>true,'message'=>''];
	}

}
