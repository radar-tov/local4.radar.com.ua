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
        'file'
    ];
}
