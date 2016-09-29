<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentMethodsController extends AdminController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$methods = PaymentMethod::all();
		return view('admin.payment_methods.index', compact('methods'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.payment_methods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$method = PaymentMethod::create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.payments.index');
		}

		return redirect()->route('dashboard.payments.edit', $method->id);
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
		$method = PaymentMethod::find($id);
		return view('admin.payment_methods.edit', compact('method'));
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
		$method = PaymentMethod::find($id);
		$method->update($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.payments.index');
		}

		return redirect()->route('dashboard.payments.edit', $method->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		PaymentMethod::destroy($id);
		return redirect()->back();
	}
}
