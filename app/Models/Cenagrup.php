<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cenagrup extends Model
{
    protected $fillable = [
        'name',
        'valuta',
        'curs',
        'skidka',
        'nacenka',
        'coment',
        'file',
        'pereschet',
        'skidka_montaj',
        'curs_opt',
        'skidka_opt',
        'brand_id'
    ];

    public function getCountProducts(){
        return $this->hasMany('App\Models\Product', 'cenagrup_id', 'id');
    }
}
