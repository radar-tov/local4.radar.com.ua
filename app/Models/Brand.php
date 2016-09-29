<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['title'];

    public static function findOrCreate($title = '')
    {
        $brand = null;

        if($title) {
            $brand = static::where('title','like',$title)->first();

            if(count($brand)) {
                return $brand->id;
            }

            $brand = static::create(['title'=>$title]);

            return $brand->id;
        }

        return 0;
    }

}
