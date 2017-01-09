<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterProduct extends Model
{
    protected $table = 'parameter_product';
    protected $fillable = ['parameter_id', 'product_id', 'parameter_value_id'];
    public $timestamps = false;
}
