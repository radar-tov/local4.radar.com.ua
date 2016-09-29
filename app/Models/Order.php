<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;


/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
	use LocalizedEloquentTrait;

	const STATUS_NEW = 1;
	const STATUS_CONFIRMED = 2;
	const STATUS_SENT = 3;
	const STATUS_READY = 4;
	const STATUS_CANCELED = 5;

	/**
	 * @var array
	 */
	protected $fillable = [
		'title', 'user_id', 'total', 'payment_method_id', 'shipment_method_id',
		'status_id', 'note', 'comment', 'delivery_address',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		return $this->hasMany(OrderedProduct::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function shipping_method()
	{
		return $this->belongsTo(ShipmentMethod::class, 'shipment_method_id', 'id');
	}

	public function getTotal()
	{

		$total = 0;

		foreach($this->products as $product){
			$total += $product->price * $product->qty;
		}

		return number_format($total, 0, '.', ' ');
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}


}
