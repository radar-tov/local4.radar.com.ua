<?php

namespace App\Models;

class Parameter extends Eloquent
{
	protected $fillable = ['title','slug'];

	public function values()
	{
		return $this->hasMany('App\Models\ParametersValue');
	}
}
