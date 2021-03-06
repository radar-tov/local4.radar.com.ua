<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Parameter\CreateRequest;
use App\Http\Requests\Parameter\UpdateRequest;
use Illuminate\Http\Request;
Use App\Models\Parameter;
use App\Models\ParametersValue;
use App\Models\Product;
use App\Models\ParameterProduct;


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
		$params = $parameter->where('category_id', $categoryID)->where('brand_id', $brandID)->orderBy('title')->with('getValues')->get();
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

			for($i=0; $i < 11; $i++){
				if($request['param_'.$i] != ''){

					$params = [
						'title' => trim($request['param_'.$i]),
						'category_id' => $request['categoryID'],
						'brand_id' => $request['brandID']
					];

					$parameter_id = $parameter->add($params);

					if($parameter_id){

						$value = [
							'parameter_id' =>$parameter_id,
							'value' => '',
						];

						$default_value_id = $parameter->addValue($value);
						$parameter->where('id', $parameter_id)->update(['default_value' => $default_value_id ]);

						$value = [
							'parameter_id' =>$parameter_id,
							'value' => trim($request['value_'.$i])
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
		//dd($request->all());

		if($request['param_1'] != ''){
			for($i=0; $i < 11; $i++){
				if($request['param_'.$i] != ''){

					$params[] = [
						'product_id' =>$request['productID'],
						'parameter_id' => $request['param_'.$i],
						'parameter_value_id' => $request['value_'.$i]
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
        $product = $product->find($request->id);
		return view('admin.parameters.list', compact('parameters', 'product'));
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
		$values = $parameterValue->where('parameter_id', $parameterID)->orderBy('value')->get();
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
	public function save_value(Parameter $parameter, ParametersValue $value, Request $request)
	{
		//dd($request->all());
		if($request->value_2 != ''){

			$value = [
				'parameter_id'  =>  $request->parameterID,
				'value'         =>  trim($request->value_2)
			];

			$parameter_value_id = $parameter->addValueUn($value);

			if($parameter->updateValue($request, $parameter_value_id)){
				return '<h3 align="center">Сохранено</h3>';
			}else{
                return '<h3 align="center">Не сохранено! Дубликат.</h3>';
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
	public function delete(Parameter $parameter, Request $request)
	{
		if(isset($request->productID) && isset($request->paramID)){
			return $parameter->deleteParam($request->paramID, $request->productID);
		}
	}

	public function getvalue(ParametersValue $arametersValue, Request $request){
		//dump($request->all());

		$values = $arametersValue->where('parameter_id', $request->id)->orderBy('value')->get();

		$data = "<select id='value_".$request->i."' name='value_".$request->i."' class='validate form-control'>";

		foreach($values as $value){
			$data = $data."<option value='".$value->id."'>".$value->value."</option>";
		}

		$data = $data."</select>";

		return $data;
	}

	public function edit_param(Parameter $parameter, $id){
		$param = $parameter->where('id', $id)->first();
		return view('admin.parameters.edit_param', compact('param'));
	}

	public function save_param(Parameter $parameter, Request $request){
		if($parameter->where('id', $request->parameterID)->update(['title' => trim($request->param)])){
			return '<h3 align="center">Сохранено</h3>';
		}else{
			return response()->json(['errors'=>'error']);
		}
	}

    public function getParam(Request $request){
        return Parameter::where('category_id', $request->id)->groupBy('brand_id')->with('brand')->get();
    }

    public function orderList(Request $request){
        $parameters = Parameter::where('category_id', $request->category_id)->where('brand_id', $request->brand_id)->orderBy('order')->get();
        return view('admin.parameters.order', compact('parameters'));
    }

    public function orderSave(){

        foreach(\Request::get('serialized') as $fileKey => $file) {
            $result = Parameter::find($file['id'])->update(['order' => $fileKey]);
        }
        return ['success' => true];

    }

    public function editValueName($valueID){
        $value = ParametersValue::where('id', $valueID)->first();
        return view('admin.parameters.editValueName', compact('value'));
    }


    public function saveValueName(Request $request){
        if(ParametersValue::find($request->id)->update($request->all())){
            return "<h3 align='center'>Сохранено</h3>";
        }else{
            return "<h3 align='center'>Ошибка</h3>";
        }
    }

    public function editParamName($catID, $brandID, $productID, $id){
        $params = Parameter::where('category_id', $catID)->where('brand_id', $brandID)->orderBy('title')->get();

        $data = [
            'product_id'  => $productID,
            'parameter_id'=> $id,
            'category_id' => $catID,
            'brand_id'    => $brandID
        ];

        return view('admin.parameters.editParamName', compact('params'))->with('data', $data);
    }

    public function saveParamName(Parameter $parameter, Request $request){
        //dd($request->all());
        if($request->value_1 == 0){

            $params = [
                'title' => trim($request->value_2),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
            ];

            $parameter_id = $parameter->add($params);

            if($parameter_id) {

                $value = [
                    'parameter_id' => $parameter_id,
                    'value' => '',
                ];

                $default_value_id = $parameter->addValue($value);
                $parameter->where('id', $parameter_id)->update(['default_value' => $default_value_id]);

                if ($default_value_id) {

                    $parameter_product = [
                        'parameter_id' => $parameter_id,
                        'parameter_value_id' => $default_value_id,
                        'product_id' => $request->product_id
                    ];


                    if ($parameter->saveParamsProduct($parameter_product)) {
                        return "<h3 align='center'>Добавлено № $parameter_id.</h3><br>";
                    } else {
                        return "<h3 align='center'>Ошибка</h3><br>";
                    }

                } else {
                    return '<h3 align="center">Ошибка добавления параметра в базу.</h3>';
                }
            }

        }else{
            $model = ParameterProduct::where('product_id', $request->product_id)->where('parameter_id', $request->parameter_id)->first();
            $ar = explode(',', $request->value_1);
            $data = [
                'parameter_id'      => $ar[0],
                'product_id'        => $request->product_id,
                'parameter_value_id'=> $ar[1]
            ];
            if($model->update($data)){
                return "<h3 align='center'>Сохранено</h3>";
            }else{
                return "<h3 align='center'>Ошибка</h3>";
            }
        }
    }

}
