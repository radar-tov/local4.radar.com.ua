<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Filter\CreateRequest;
use App\Http\Requests\Filter\UpdateRequest;
Use App\Models\Filter;
use App\Models\Product;
use Illuminate\Http\Request;

class FiltersController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param Filter $filter
	 * @return Response
	 */
	public function index(Filter $filter)
	{
		$filters = $filter->with('categories')->get();

		return view('admin.filters.index')->withFilters($filters);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$filter = Filter::create([]);

		return redirect()->route('dashboard.filters.edit',[$filter->id]);
		//return view('admin.filters.create')->withFilter(new Filter);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateRequest $request
	 * @param Filter $filter
	 * @return Response
	 */
	public function store(CreateRequest $request,Filter $filter)
	{
		$filter = $filter->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.filters.index')->withMessage('');
		}

		return redirect()->route('dashboard.filters.edit',[$filter->id])->withFilter($filter);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $productId
	 * @param Request $request
	 * @return Response
	 * @internal param $categoryId
	 * @internal param int $id
	 */
	public function show($productId, Request $request)
	{
		$product = Product::with('category.strain.values','filters','filterValuesWithFilters')->find($productId);

		$filters =  Filter::whereHas('categories', function($category) use($request){
			$category->where('id', $request->get('category_id'));
		})->with('values')->get();

		return view('admin.filters.select_form', compact('filters', 'product'))->render();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Filter $filter
	 * @param  int $id
	 * @return Response
	 */
	public function edit(Filter $filter, $id)
	{
		$filter = $filter->with('values')->findOrFail($id);

		return view('admin.filters.edit')->withFilter($filter);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Filter $filter
	 * @param UpdateRequest $request
	 * @param  int $id
	 * @return Response
	 */
	public function update(Filter $filter, UpdateRequest $request, $id)
	{
		$filter = $filter->findOrFail($id)->update($request->all())->with('values');

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.filters.index')->withMessage('');
		}

		return redirect()->route('dashboard.filters.edit',[$id])->withFilter($filter);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Filter $filter
	 * @param  int $id
	 * @return Response
	 */
	public function destroy(Filter $filter, $id)
	{
		$filter->findOrFail($id)->delete();

		return redirect()->route('dashboard.filters.index');
	}
}
