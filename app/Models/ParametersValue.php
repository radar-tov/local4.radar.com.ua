<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParametersValue extends Model
{
    public function parameter(){
        return $this->belongsTo('App\Models\Parameter', 'parameter_id', 'id');
    }
}
