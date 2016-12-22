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
	public function index(Parameter $parameter, $categoryID, $brandID, $productID)
	{
		$params = $parameter->where('category_id', $categoryID)->where('brand_id', $brandID)->lists('id', 'title');

		return view('admin.parameters.selection', compact('params') )->with('request', ['categoryID' => $categoryID, 'brandID' => $brandID, 'productID' => $productID]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($categoryID, $brandID){
		return view('admin.parameters.create')->with('request', ['categoryID' => $categoryID, 'brandID' => $brandID]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateRequest $request
	 * @param Parameter $parameter
	 * @return Response
	 */
	public function addparams(Request $request, Parameter $parameter)
	{
		dd($request->all());
//
//		if($request['param'][0] != ''){
//			$date = new \DateTime('NOW');
//
//			for($i=0; $i < 10; $i++){
//				if($request['param'][$i] != ''){
//					$params[] = [
//						'title' =>$request['param'][$i],
//						'category_id' => $request['categoryID'],
//						'brand_id' => $request['brandID'],
//						'created_at'    =>  $date->format("Y-m-d H:i:s"),
//						'updated_at'    =>  $date->format("Y-m-d H:i:s")
//					];
//				}
//			}
//
//			if($parameter->add($params)){
//				return '<h3 align="center">Сохранено</h3>';
//			}else{
//				return response()->json(['errors'=>'error']);
//			}
//
//		}else{
//			return response()->json(['errors'=>'error']);
//		}

	}

	public function saveParams(Request $request, Parameter $parameter){
		//dump($request->all());

		if($request['param'][0] != ''){
			for($i=0; $i < 10; $i++){
				if($request['param'][$i] != ''){
					$params[] = [
						'product_id' =>$request['productID'],
						'parameter_id' => $request['param'][$i]
					];
				}
			}

			if($parameter->saveParamsProduct($params)){
				return '<h3 align="center">Сохранено</h3>';
			}else{
				return response()->json(['errors'=>'error']);
			}

		}else{
			return response()->json(['errors'=>'error']);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//return "method show is not allowed";
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
//		$parameter = $parameter->with('values')->findOrFail($id);
//
//		return view('admin.parameters.edit')->withParameter($parameter);
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
//		$parameter = $parameter->findOrFail($id)->update($request->all())->with('values');
//
//		if((int)$request->get('button')) {
//			return redirect()->route('dashboard.parameters.index')->withMessage('');
//		}
//
//		return redirect()->route('dashboard.parameters.edit',[$parameter->id])->withParameter($parameter);
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
//		$parameter->findOrFail($id)->delete();
//
//		return redirect()->route('dashboard.parameters.index');
	}

	public function values(ParametersValue $value, $id)
	{
		//return $value->where('parameter_id',$id)->orderBy('id','desc')->get()->toArray();
	}

	public function addValue(Request $request)
	{
		//return ParametersValue::create($request->all());
	}

}
