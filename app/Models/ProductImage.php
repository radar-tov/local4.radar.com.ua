<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {

	protected $fillable = [
		"path", "is_thumb", "alt", "title","is_certificate"
	];

	protected $table = "images";

	public function products()
	{
		return $this->belongsToMany('App\Models\Product','product_product_image', 'product_image_id', 'product_id');
	}
}
