<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = ['category_id', 'title', 'is_filter'];
	public $timestamps = false;

	public function values()
	{
		return $this->hasMany(CharacteristicValue::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class,'categories');
	}
	public function filterValues()
	{
		return $this->hasMany(CharacteristicValue::class)->where('value','!=', '')->has('product', '>', 0)->groupBy('value');
	}

	public function scopePresentedSelect($query)
	{
		$query->select([
			'characteristics.id as id',
			'characteristics.title',
			'characteristic_values.value',
			'characteristic_values.id as val_id',
		]);
	}

	public function scopeByCategory($query, $categoryId)
	{
		$query->where('category_id', $categoryId);
	}

	public function scopeJoinWithProductValue($query, $product)
	{
		$query->leftjoin('characteristic_values', function($join) use($product){
			$join->on('characteristics.id', '=', 'characteristic_values.characteristic_id')
				->where('characteristic_values.product_id', '=', $product->id);
		});
	}

	public function scopeJoinCategoryFields($query)
	{
		$query->leftjoin('characteristic_values', function($join){
			$join->on('characteristics.id', '=', 'characteristic_values.characteristic_id');
		});
	}
	

	public function scopeForCreate($query, $categoryId)
	{
		$query->byCategory($categoryId);
	}

	public function scopeForUpdate($query, $categoryId, $product)
	{
		$query->presentedSelect()->byCategory($categoryId)->joinWithProductValue($product);
	}

}
