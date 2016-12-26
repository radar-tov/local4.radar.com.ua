<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Parameter\CreateRequest;
use App\Http\Requests\Parameter\UpdateRequest;
use Illuminate\Http\Request;
Use App\Models\Parameter;
use App\Models\ParametersValue;
use App\Models\Product;


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
		$params = $parameter->where('category_id', $categoryID)->where('brand_id', $brandID)->with('getValues')->get();
//dd($params);
		return view('admin.parameters.selection', compact('params') )->with('request', ['categoryID' => $categoryID, 'brandID' => $brandID, 'productID' => $productID]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($categoryID, $brandID, $productID){
		return view('admin.parameters.create')->with('request', ['categoryID' => $categoryID, 'brandID' => $brandID, 'productID' => $productID]);
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
		//dd($request->all());
		$flag = '';

		if($request['param_1'] != ''){
			$date = new \DateTime('NOW');

			for($i=0; $i < 10; $i++){
				if($request['param_'.$i] != ''){

					$params = [
						'title' =>$request['param_'.$i],
						'category_id' => $request['categoryID'],
						'brand_id' => $request['brandID'],
						'created_at'    =>  $date->format("Y-m-d H:i:s"),
						'updated_at'    =>  $date->format("Y-m-d H:i:s")
					];

					$parameter_id = $parameter->add($params);

					if($parameter_id){

						$value = [
							'parameter_id' =>$parameter_id,
							'value' => '',
							'created_at'    =>  $date->format("Y-m-d H:i:s"),
							'updated_at'    =>  $date->format("Y-m-d H:i:s")
						];

						$default_value_id = $parameter->addValue($value);
						$parameter->where('id', $parameter_id)->update(['default_value' => $default_value_id ]);

						$value = [
							'parameter_id' =>$parameter_id,
							'value' => $request['value_'.$i],
							'created_at'    =>  $date->format("Y-m-d H:i:s"),
							'updated_at'    =>  $date->format("Y-m-d H:i:s")
						];

						$parameter_value_id = $parameter->addValue($value);

						if($parameter_value_id){

							$parameter_product = [
								'parameter_id' =>$parameter_id,
								'parameter_value_id' => $parameter_value_id,
								'product_id' => $request['productID']
							];


							if($parameter->saveParamsProduct($parameter_product)){
								$flag = $flag."<h3 align='center'>Добавлено № $parameter_id.</h3><br>";
							}else{
								$flag = $flag."<h3 align='center'>Ошибка</h3><br>";
							}

						}else{
							$flag = '<h3 align="center">Ошибка добавления параметра в базу.</h3>';
						}

					}else{
						$flag = '<h3 align="center">Ошибка добавления параметра в базу.</h3>';
					}

				}

			}

			return $flag;

		}else{
			return $flag."Ошибка";
		}

	}

	public function saveParams(Request $request, Parameter $parameter){
		dd($request->all());

		if($request['param'][0] != ''){
			for($i=0; $i < 10; $i++){
				if($request['param'][$i] != ''){

					$parameter_value_id = $parameter->where('id', $request['param'][$i])->pluck('default_value');
					$params[] = [
						'product_id' =>$request['productID'],
						'parameter_id' => $request['param'][$i],
						'parameter_value_id' => $parameter_value_id
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
	public function show(Request $request, Product $product)
	{
		$product = $product->find($request->id)->getParameters;
		return view('admin.parameters.list', compact('product'))->with('product_id', ['id' => $request->id]);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Parameter $parameter
	 * @param  int $id
	 * @return Response
	 */
	public function edit(ParametersValue $parameterValue, $productID, $parameterID)
	{
		$values = $parameterValue->where('parameter_id', $parameterID)->get();
		$param = Parameter::where('id', $parameterID)->first();
		return view('admin.parameters.edit_value', compact('values', 'param'))->with('data', ['productID' => $productID]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Parameter $parameter
	 * @param UpdateRequest $request
	 * @param  int $id
	 * @return Response
	 */
	public function save_value(Parameter $parameter, Request $request)
	{
		//dd($request->all());
		if($request->value_2 != ''){

			$date = new \DateTime('NOW');

			$value = [
				'parameter_id' =>$request->parameterID,
				'value' => $request->value_2,
				'created_at'    =>  $date->format("Y-m-d H:i:s"),
				'updated_at'    =>  $date->format("Y-m-d H:i:s")
			];

			$parameter_value_id = $parameter->addValue($value);

			if($parameter->updateValue($request, $parameter_value_id)){
				return '<h3 align="center">Сохранено</h3>';
			}else{
				return response()->json(['errors'=>'error']);
			}

		}else{

			if($parameter->updateValue($request, $request->value_1)){
				return '<h3 align="center">Сохранено</h3>';
			}else{
				return response()->json(['errors'=>'error']);
			}

		}
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

	}

	public function getvalue(Parameter $parameter,Request $request){

		$values =  $parameter->getValueID($request->id);
		dd($values);
	}

}
