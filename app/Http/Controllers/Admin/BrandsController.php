<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $brands = Brand::all();
	    return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $brand = Brand::create($request->all());

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.brands.index');
	    }

	    return redirect()->route('dashboard.brands.edit', $brand->id);
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
	    $brand = Brand::find($id);

	    return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
	    $brand = Brand::find($id);
	    $brand->update($request->all());

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.brands.index');
	    }

	    return redirect()->route('dashboard.brands.edit', $brand->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
	    return redirect()->back();
    }
}
