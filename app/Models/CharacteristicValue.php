<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicValue extends Model
{
	protected $fillable = ['product_id', 'characteristic_id', 'value'];
	public $timestamps = false;

	public function fields()
	{
		return $this->belongsTo('App\Models\Characteristic', 'characteristic_id', 'id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

}
