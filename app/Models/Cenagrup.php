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
        'pereschet'
    ];

    public function getCountProducts(){
        return $this->hasMany('App\Models\Product', 'cenagrup_id', 'id');
    }
}
