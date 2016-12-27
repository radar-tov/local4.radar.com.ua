<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicValue extends Model
{
	protected $table = 'characteristic_values';
	protected $fillable = ['characteristic_id', 'value', 'order'];
	public $timestamps = false;

	public static function boot()
	{
		parent::boot();
		static::creating( function($value) {
			$value->order = 1 + CharacteristicValue::where('characteristic_id', $value->characteristic_id)->max('order');
		});
	}

	public function characteristic(){
		return $this->belongsTo('App\Models\Characteristic', 'characteristic_id', 'id');
	}

	public function fields()
	{
		return $this->belongsTo('App\Models\Characteristic', 'characteristic_id', 'id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

}
