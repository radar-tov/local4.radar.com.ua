<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CharacteristicValue;
use App\Http\Requests\CharacteristicsValues\CreateRequest;
use App\Http\Requests\CharacteristicsValues\UpdateRequest;

class CharacteristicsValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, CharacteristicValue $values)
    {
        return $values->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CharacteristicValue $values, $id)
    {
        return ['success'=>true,$values->findOrFail($id)->update($request->all())];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CharacteristicValue $values, $id)
    {
        try{
            $values->findOrFail($id)->delete();
        } catch(ModelNotFoundException $e) {
            return ['success'=>false,'message'=>$e->getMessage()];
        }

        return ['success'=>true];
    }

    public function fetchByCharacteristic(CharacteristicValue $value, $id){
        return $value->where('characteristic_id',$id)->orderBy('order')->get();
    }

    public function order(Request $request, CharacteristicValue $value)
    {
        foreach($request->get('serialized') as $order=>$val)
        {
            $value->find($val['id'])->update(['order'=>$order]);
        }

        return ['success'=>true,'message'=>''];
    }
}
