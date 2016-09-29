<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    protected $fillable = ['title'];


	public function sales()
	{
		return $this->belongsToMany('App\Models\Sale');
	}

	public function customers()
	{
		return $this->belongsToMany('App\Models\User');
	}

}
