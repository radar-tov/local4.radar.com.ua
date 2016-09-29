<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentMethod extends Model
{
    protected $fillable = ['title', 'price'];
	public $timestamps = false;
}
