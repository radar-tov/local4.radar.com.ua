<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterValue extends Model
{
    protected $table = 'filter_values';

    protected $fillable = ['filter_id','order','value'];

	public static function boot()
	{
		parent::boot();
		static::creating( function($value) {
				$value->order = 1 + FilterValue::where('filter_id', $value->filter_id)->max('order');
			});
	}


	public function parameter()
    {
        return $this->belongsTo('App\Models\Filter');
    }

	/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

	/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'filter_product',  'filter_value_id','product_id' );
    }
}
