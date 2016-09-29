<?php

namespace App\ViewDataProviders;


use App\Models\Product;
use App\Services\ProductService;
use App\Models\Category;

class ProductsDataProvider {


	public static $saved = [];
	/**
	 * @var
	 */
	private $productService;

	/**
	 * @param ProductService $productService
	 */
	function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}


	public function __get($property)
	{
		isset(static::$saved[$property]) ?: static::$saved[$property] = $this->productService->{'get'. ucfirst($property)}();
		return static::$saved[$property];
	}


	public function getMaxPrice($categoryId)
	{

		// return "OK!";
		
		if($categoryId){
			$category = Category::where('id', $categoryId)->with('children')->first();
			$categories = [$category->id] + $category->children->lists('id')->toArray();

			$price = Product::whereIn('category_id', $categories)->visible()->max('price');
		} else {
			$price = Product::max('price');
		}

		return $price;
	}

}