<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Eloquent extends Model
{
	/**
	 * Show visible items
	 * @param $query
	 * @return mixed
	 */
	public function scopeShow($query)
	{
		return $query->where('show',true);
	}

	/**
	 * Show visible items
	 * @param $query
	 */
	public function scopeVisible($query)
	{
		// Interesting, how it work ?
		// return $this->scopeShow($query);
		$query->where('show', true);
	}

	/**
	 * Show active items
	 * @param $query
	 * @return mixed
	 */
	public function scopeActive($query)
	{
		return $query->where('active',true);
	}

	/**
	 * Override Laravel update method
	 * for more flexibility
	 * @param array $attributes
	 * @return mixed
	 */
	public function update(array $attributes = [])
	{
		parent::update($attributes);

		return $this;
	}

}
