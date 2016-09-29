<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShipmentMethod;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShipmentMethodsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $methods = ShipmentMethod::all();
	    return view('admin.shipment_methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.shipment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $method = ShipmentMethod::create($request->all());

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.shipments.index');
	    }

	    return redirect()->route('dashboard.shipments.edit', $method->id);
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
        $method = ShipmentMethod::find($id);
	    return view('admin.shipment_methods.edit', compact('method'));
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
	    $method = ShipmentMethod::find($id);
	    $method->update($request->all());

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.shipments.index');
	    }

	    return redirect()->route('dashboard.shipments.edit', $method->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ShipmentMethod::destroy($id);
	    return redirect()->back();
    }
}
