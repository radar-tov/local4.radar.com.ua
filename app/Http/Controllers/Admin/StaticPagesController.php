<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\StaticPage;
use Illuminate\Http\Request;

class StaticPagesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = StaticPage::all();
        return view('admin.static_pages.index', compact('pages'));
    }


    public function create(){
        $staticPage = StaticPage::create([]);
        return redirect()->route('static_pages.edit', [$staticPage->id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = StaticPage::find($id);
        return view('admin.static_pages.edit', compact('page'));
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
        $page = StaticPage::find($id);
        
        $page->update($request->all());
        

        if((int)$request->get('button')) {
            return redirect()->route('static_pages.index')->withMessage('');
        }

        return redirect()->route('static_pages.edit',$page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaticPage::destroy($id);
        return redirect()->back();
    }
}
