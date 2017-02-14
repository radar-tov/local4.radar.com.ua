<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countrys';
    public $timestamps = false;
    public $fillable = ['name'];

    public static function findOrCreate($name = '')
    {
        $country = null;

        if($name) {
            $country = static::where('name','like',$name)->first();

            if(count($country)) {
                return $country->id;
            }

            $country = static::create(['name'=>$name]);

            return $country->id;
        }

        return 0;
    }
}
