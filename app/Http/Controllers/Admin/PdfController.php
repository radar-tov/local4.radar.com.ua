<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = DB::table('file_product')->leftJoin('files', 'files.id', '=', 'file_product.file_id')
            ->where('file_product.product_id', $request->id)->get();

        return view('admin.pdf.list', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Загрузка PDF Запрос POST
     */
    public function create()
    {
        //return 'store';
        //return self::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file)
    {
        if($file->addSelectFile($request)){
            return '<h3 align="center">Сохранено</h3>';
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file, $category_id, $id)
    {
        $file = $file->orderBy('admin_name')->where('category_id', $category_id)->lists('admin_name', 'id');
        return view('admin.pdf.add', compact('file') )->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file, $id, $productID)
    {
        $file = $file->where('id', $id)->first();
        $productShow = $file->visible($id, $productID);

        return view('admin.pdf.edit', compact('file', 'productShow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $files)
    {

        $files->updateProduct($request);

        $mas = [
            'name' => $request->name,
            'path' => $request->path,
            'hash_name' => $request->hash_name,
            'downloads' => $request->downloads,
            'show' => ($request->show == 'true') ? 1 : 0 ,
            'admin_name' => $request->admin_name,
            'category_id' => $request->category_id
        ];

        //dump($mas);

        if($files->where('id', $request->fileID)->update($mas)){
            return '<h3 align="center">Сохранено</h3>';
        }else{
            return response()->json(['status'=>'error']);
        }


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

    public function isCheckbox($request, $checkbox, $name)
    {
        if (isset($checkbox) && $checkbox == 'on') {
            $request->merge([$name => true]);
        } else {
            $request->merge([$name => false]);
        }
        return $request;
    }
}
