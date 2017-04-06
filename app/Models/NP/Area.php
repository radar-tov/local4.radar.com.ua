<?php

namespace App\Models\NP;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['Description', 'Ref', 'AreasCenter'];
    protected $table = 'np_areas';
}
