<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerGroupsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groups = CustomerGroup::all();
	    return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $group = CustomerGroup::create($request->all());
	    $group->customers()->sync($request->get('customers') ?: []);


	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.groups.index');
	    }

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.groups.index')->withMessage('');
	    }

	    return redirect()->route('dashboard.groups.edit',$group->id);
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
        $group = CustomerGroup::find($id);
	    return view('admin.groups.edit', compact('group'));
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
	    $group = CustomerGroup::find($id);
	    $group->update($request->all());
	    $group->customers()->sync($request->get('customers') ?: []);

	    if((int)$request->get('button')) {
		    return redirect()->route('dashboard.groups.index');
	    }

	    return redirect()->route('dashboard.groups.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        CustomerGroup::destroy($id);
	    return redirect()->route('dashboard.groups.index');
    }
}
