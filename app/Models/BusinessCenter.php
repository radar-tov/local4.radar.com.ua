<?php namespace App\Models;

class BusinessCenter extends Eloquent
{
	protected $fillable = ['name', 'city_id'];

	public $timestamps = false;

	public function city()
	{
		return $this->belongsTo('\App\Models\City');
	}

}
