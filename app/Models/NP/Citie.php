<?php

namespace App\Models\NP;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    protected $table = 'np_cities';
    protected $fillable = [
        'Ref',
        'Description',
        'DescriptionRu',
        'Area',
        'PreventEntryNewStreetsUser',
//        'Conglomerates',
        'CityID'
    ];
}
