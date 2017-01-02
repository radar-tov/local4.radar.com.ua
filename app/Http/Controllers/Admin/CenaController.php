<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cenagrup;

class CenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cena.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cenagrup = Cenagrup::create([]);
        return view('admin.cena.create', compact('cenagrup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cenagrup $cenagrup, Request $request)
    {
        if($cenagrup->findOrFail($request->id)->update($request->all())){
            return '<h3 align="center">Сохранено.</h3>';
        }else{
            return '<h3 align="center">Ошибка.</h3>';
        }
    }


    public function show(Cenagrup $cenagrup){
        $cenagrups = $cenagrup->orderBy('name')->get();
        return view('admin.cena.list', compact('cenagrups'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cenagrup = Cenagrup::find($id);
        return view('admin.cena.edit', compact('cenagrup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
