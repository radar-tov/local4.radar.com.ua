<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['title', 'active'];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['is_main', 'stock_price']);
    }

    public function uniqueProducts()
    {
    	return $this->belongsToMany(Product::class)
    				->where('clone_of', 0)
    				->with('relevantSale','thumbnail')
					->withPivot(['is_main', 'stock_price'])
					->orderBy('stock_price', 'DESC');
    }
    

    public function orderedProducts()
    {
        return $this->belongsToMany(Product::class)->withPivot(['is_main', 'stock_price'])->orderBy('stock_price', 'DESC')->orderBy('stock_price','DESC');
    }
    
    public function totalPrice()
    {
        $price = 0;
        foreach ($this->uniqueProducts as $product) {
            if($product->stockPriceLessThenDiscountPrice()){
                $price += str_replace(' ', '', $product->getStockPrice());
            } else {
                $price += str_replace(' ', '', $product->getNewPrice());                
            }
        }
        return number_format($price, 0, '', ' ');
    }


}
