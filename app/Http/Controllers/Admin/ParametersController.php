<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Parameter\CreateRequest;
use App\Http\Requests\Parameter\UpdateRequest;
use Illuminate\Http\Request;
Use App\Models\Parameter;
use App\Models\ParametersValue;


class ParametersController extends AdminController
{
	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Parameter $parameter
	 * @return Response
	 */
	public function index(Parameter $parameter)
	{
		return view('admin.parameters.index')->withParameters($parameter->all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.parameters.create')->withParameter(new Parameter);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateRequest $request
	 * @param Parameter $parameter
	 * @return Response
	 */
	public function store(CreateRequest $request,Parameter $parameter)
	{
		$parameter = $parameter->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.parameters.index')->withMessage('');
		}

		return redirect()->route('dashboard.parameters.edit',[$parameter->id])->withParameter($parameter);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "method show is not allowed";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Parameter $parameter
	 * @param  int $id
	 * @return Response
	 */
	public function edit(Parameter $parameter, $id)
	{
		$parameter = $parameter->with('values')->findOrFail($id);

		return view('admin.parameters.edit')->withParameter($parameter);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Parameter $parameter
	 * @param UpdateRequest $request
	 * @param  int $id
	 * @return Response
	 */
	public function update(Parameter $parameter, UpdateRequest $request, $id)
	{
		$parameter = $parameter->findOrFail($id)->update($request->all())->with('values');

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.parameters.index')->withMessage('');
		}

		return redirect()->route('dashboard.parameters.edit',[$parameter->id])->withParameter($parameter);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Parameter $parameter
	 * @param  int $id
	 * @return Response
	 */
	public function destroy(Parameter $parameter, $id)
	{
		$parameter->findOrFail($id)->delete();

		return redirect()->route('dashboard.parameters.index');
	}

	public function values(ParametersValue $value, $id)
	{
		return $value->where('parameter_id',$id)->orderBy('id','desc')->get()->toArray();
	}

	public function addValue(Request $request)
	{
		return ParametersValue::create($request->all());
	}

}
