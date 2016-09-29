<?php
namespace App\Models;

use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

class Review extends Eloquent
{

	use LocalizedEloquentTrait;


    protected $fillable = ['user_id','product_id','rating','likes','body','active'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
