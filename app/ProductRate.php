<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model
{
    protected $fillable = ['rate'];

	public function users()
	{
		return $this->belongsToMany(User::class, 'product_rate_product');
	}

}
