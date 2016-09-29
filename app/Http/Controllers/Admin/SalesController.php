<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SalesRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends AdminController
{
	public $productService;

	function __construct(ProductService $productService)
	{
		$this->productService = $productService;
		parent::__construct();
	}


	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	    $sales = Sale::with('products')->get();
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sales.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SalesRequest|Request $request
	 * @return Response
	 */
    public function store(SalesRequest $request)
    {
	    $request = $this->formatRequestDate($request);
	    $sale = Sale::create($request->all());
//	    $this->productService->attachProductsToSale($request->get('selectedProductsIds'), $sale->id);

	    $sale->products()->sync($this->prepareIds($request->get('selectedProductsIds'), $request->get('all')));
	    $sale->customerGroups()->sync($request->get('groups') ?: []);

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.sales.index')->withMessage('');
	    }
	    return redirect()->route('dashboard.sales.edit', $sale->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sale = Sale::with('products')->find($id);
	    return view('admin.sales.edit', compact('sale'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param SalesRequest|Request $request
	 * @param  int $id
	 * @return Response
	 */
    public function update(SalesRequest $request, $id)
    {

	    $request = $this->formatRequestDate($request);
	    $sale = Sale::find($id);
	    $sale->update($request->all());
//	    dd($sale->products()->count());
//		dd($this->prepareIds($request->get('selectedProductsIds'), $request->get('all')));
	    $sale->customerGroups()->sync($request->get('groups') ?: []);
	    $sale->products()->sync($this->prepareIds($request->get('selectedProductsIds'), $request->get('all')));

//	    dd($this->prepareIds($request->get('selectedProductsIds')));

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.sales.index')->withMessage('');
	    }

	    return redirect()->route('dashboard.sales.edit', $sale->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
	    $sale = Sale::find($id);
	    $sale->products()->update(['products.sale_id' => null]);
        $sale->delete();
	    return redirect()->back();
    }

	public function formatRequestDate($request)
	{
		if($request->get('date')){
			$date = explode('-', $request->get('date'));
			$request['start_at'] = Carbon::parse($date[0])->toDateTimeString();
			$request['stop_at'] = Carbon::parse($date[1])->endOfDay()->toDateTimeString();
		}

		return $request;
	}


	public function prepareIds($idsString, $all = null)
	{
		if($all) return Product::lists('id')->all();
		if(empty($idsString)) return [];

		return explode(',', $idsString);
	}


}

