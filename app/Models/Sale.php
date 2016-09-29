<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

class Sale extends Model
{
	use LocalizedEloquentTrait;

    protected $fillable = ['title', 'discount', 'start_at', 'stop_at', 'is_active'];
	protected $dates = ['created_at', 'updated_at', 'start_at', 'stop_at'];

	public function products()
	{
		return $this->belongsToMany('App\Models\Product');
	}


	public function customerGroups()
	{
		return $this->belongsToMany('App\Models\CustomerGroup');
	}


	public function scopeActualSale($query)
	{
		$query->where('is_active', true)
				->where('discount', '>', 0)
				->where('start_at', '<=', Carbon::now())
				->where('stop_at', '>=', Carbon::now())
				->orderBy('discount', 'DESC');
	}
}
