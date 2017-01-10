<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class File extends Model
{
    protected $fillable = [
        'name',
        'path',
        'hash_name',
        'downloads',
        'show',
        'created_at',
        'updated_at',
        'admin_name',
        'category_id',
        'brand_id',
        'order'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('show','order');
    }

    public function add($path, $request){
        $date = new \DateTime('NOW');
        $id = DB::table('files')->insertGetId([
                'path'          =>  $path,
                'show'          =>  1,
                'category_id'   =>  $request->categoryID,
                'brand_id'      =>  $request->brandID,
                'created_at'    =>  $date->format("Y-m-d H:i:s"),
                'updated_at'    =>  $date->format("Y-m-d H:i:s")
            ]);

        if(DB::table('file_product')->insert([
                'file_id'       =>  $id,
                'product_id'    =>  $request->productID,
                'show'          =>  1
            ])
        ){
            return true;
        }else{
            return false;
        }
    }

    public function deletFileProduct($productId, $fileId){
        DB::table('file_product')->where('product_id', $productId)->where('file_id', $fileId)->delete();
        if(DB::table('file_product')->where('file_id', $fileId)->first()){
            return true;
        }else{
            return false;
        }
    }

    public function deletFile($fileId){
        $file = DB::table('files')->where('id', $fileId)->first();
        if($file){
            $path = public_path($file->path);
            unlink($path);
            DB::table('files')->where('id', $fileId)->delete();
            return true;
        }
        return false;
    }

    public function visible($file_id, $product_id){
        return DB::table('file_product')->where('product_id', $product_id)->where('file_id', $file_id)->first();
    }

    public function updateProduct($request){
        DB::table('file_product')->where('product_id', $request->productID)
            ->where('file_id', $request->fileID)->update(['show' => ($request->showProduct == 'true') ? 1 : 0 ]);
    }

    public function getfileProduct($product_id){
        return DB::table('file_product')->where('product_id', $product_id)->get();
    }

    public function addSelectFile($request){
        foreach($request->fileID as $fileID){
            if($fileID != ''){
                $mas[] = [ 'product_id' => $request->productID, 'file_id' => $fileID, 'show' => 1];
            }
        }
        if(DB::table('file_product')->insert($mas)){
            return true;
        }else{
            return false;
        }
    }

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
