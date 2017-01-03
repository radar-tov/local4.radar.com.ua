<?php

namespace App\Http\Controllers\Admin;

use App\Models\Characteristic;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Characteristic\UpdateRequest;
use App\Http\Requests\Characteristic\CreateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class CharacteristicsController
 * @package App\Http\Controllers\Admin
 */
class CharacteristicsController extends AdminController
{

	public function index(Characteristic $characteristic)
	{
		$characteristics = $characteristic->with('categories')->get();
		//dd($characteristics);
		return view('admin.characteristics.index', compact('characteristics'));
	}



	public function create()
	{

		$characteristics = Characteristic::create([]);

		return redirect()->route('dashboard.characteristics.edit',[$characteristics->id]);

		//return view('admin.characteristics.create');
	}


	public function edit(Characteristic $characteristics, $id)
	{
		$characteristic = $characteristics->with('values')->findOrFail($id);
		//dump($characteristic);
		return view('admin.characteristics.edit', compact('characteristic'));
	}


	public function store(CreateRequest $request, Characteristic $characteristic)
	{
		$characteristic = $characteristic->create($request->all());

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.characteristics.index')->withMessage('');
		}

		return redirect()->route('dashboard.characteristics.edit',[$characteristic->id])->withFilter($characteristic);
	}


	public function update(Characteristic $characteristic, UpdateRequest $request, $id)
	{
		$characteristic = $characteristic->findOrFail($id)->update($request->all())->with('values');

		if((int)$request->get('button')) {
			return redirect()->route('dashboard.characteristics.index')->withMessage('');
		}

		return redirect()->route('dashboard.characteristics.edit',[$id])->withFilter($characteristic);
	}


    public function destroy(Characteristic $characteristic, $id)
    {
        $characteristic->findOrFail($id)->delete();

        return redirect()->route('dashboard.characteristics.index');
    }


    public function getCharact(Request $request)
    {
        //dd($request->all());
        return Characteristic::whereNotIn('id', $request->get('ids') ?: [0])->get();
    }


    public function show($productId, Request $request)
    {
        $product = Product::with('xaracts', 'xaractValuesWithXaracts')->find($productId);

        $xaracts =  Characteristic::whereHas('categories', function($category) use($request){
            $category->where('id', $request->get('category_id'));
        })->with('values')->get();

        return view('admin.characteristics.select_form', compact('xaracts', 'product'))->render();
    }



	/**
	 * @param Request $request
	 * @return static
	 */
//	public function createCharacteristic(Request $request)
//	{
////		dd($request->all());
//		$field = Characteristic::create($request->all());
//		return $field;
//    }

	/**
	 * @param Request $request
	 * @param $id
	 */
//	public function updateCharacteristic(Request $request, $id)
//	{
//		$field = Characteristic::find($id);
//		$field->update($request->all());
//		return $field;
//	}

	/**
	 * @param $id
	 */
//	public function deleteCharacteristic($id)
//	{
//		Characteristic::destroy($id);
//	}

	/**
	 * @param $productId
	 * @param Request $request
	 * @return mixed
	 */
//	public function getCharacteristicsForCategory($productId, Request $request)
//	{
//		$product = Product::find($productId);
//		if($product){
//			$fields = Characteristic::forUpdate($request->get('category_id'), $product)->get();
//		} else {
//			$fields = Characteristic::where('category_id', $request->get('category_id'))->get();
//		}
//
//		return $fields;
//	}


	/**
	 * @param Request $request
	 * @return mixed
	 */
//	public function getCharacteristics(Request $request)
//	{
//		$filter =  Filter::whereNotIn('id', $request->get('ids') ?: [0])->get();
//
////		$filter = $filter->map(function($filter){
////			$filter->pivot = new \stdClass();
////			$filter->pivot->is_filter = 0;
////		});
////		dd($filter);
//		return $filter;
////		return Characteristic::whereNotIn('id', $request->get('ids') ?: [0])->get();
//	}
}
