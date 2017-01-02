<?php

namespace App\Models;

class Filter extends Eloquent
{
	protected $fillable = ['title','slug'];

	public function values()
	{
		return $this->hasMany(FilterValue::class)->orderBy('order');
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class)->withPivot('show','order');
	}


	public function isVisibleForCategory($categoryId)
	{
		$category = $this->categories->where('id', $categoryId)->first();
		if(isset($category->pivot) && $category->pivot->show == 1) return true;
		return false;
	}
}
