<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Product;
/**
 * Class OrderedProduct
 * @package App\Models
 */
class OrderedProduct extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'product_id', 'title', 'article', 'qty', 'price', 'total_price', 'comment',
		'order_id', 'price_without_discount', 'applied_discount','delivery_address', 'stock'
	];

	/**
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function order()
	{
		return $this->belongsTo(Order::class);
	}


	public function getSubtotal()
	{
		return number_format($this->price * $this->qty, 0, '.', ' ');
	}

	public function original()
	{
		return $this->belongsTo(Product::class, 'product_id');
	}
}
