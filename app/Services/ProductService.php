<?php

namespace App\Services;


use App\Models\CharacteristicValue;
use App\Models\FilterValue;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService {

    /**
     * @param $product
     * @param $characteristics
     */
    public function saveCharacteristics($product, $characteristics)
	{
		if(!$characteristics) return;

		foreach($characteristics as $key => $value){
			$fieldId = explode(':', $key)[0];
			$valueId = explode(':', $key)[1];
			$fieldVal = CharacteristicValue::findOrNew($valueId);

			$fieldVal->product_id = $product->id;
			$fieldVal->characteristic_id = $fieldId;
			$fieldVal->value = $value;
			$fieldVal->save();
		}
	}

    /**
     * @param $product
     * @param $imagesIds
     */
    public function syncImages($product, $imagesIds)
	{
		$images = explode(',', $imagesIds);
		$product->images()->sync( $imagesIds ? $images : []);
	}


    /**
     * @param $products
     * @param $saleId
     */
    public function attachProductsToSale($products, $saleId)
	{
		Product::where('sale_id', $saleId)->update(['sale_id' => null]);
		if($products){
			$productsIds = explode(',', $products);
			Product::where('sale_id', null)->whereIn('id', $productsIds)->update(['sale_id' => $saleId]);
		}
	}


    /**
     * @return mixed
     */
    public function getSalesProducts()
	{
			$products = Product::where(function($query){
				$query->where('discount', '>', 0)->orHas('relevantSale');
			})
			->has('category', '>', 0)
            ->orderByRaw('RAND()')->original()->withRelations()->visible()->paginate(15);
		return $products;
	}

    /**
     * @return mixed
     */
    public function getNewProducts()
	{
		$products = Product::where('is_new', true)
			->has('category', '>', 0)
            ->original()
            ->orderBy('id', 'DESC')
            ->visible()
            ->withRelations()
            ->orderByRaw('RAND()')
            ->paginate(15);

		return $products;
	}

    /**
     * @return mixed
     */
    public function getBestsellerProducts()
	{
		return Product::where('is_bestseller', true)
            ->orderByRaw('RAND()')
        	->has('category', '>', 0)
            ->original()
            ->withRelations()
            ->visible()
            ->paginate(15);
	}


    /**
     * @return string
     */
    public function getMinPrice()
	{
		return number_format(Product::min('price'), 0, '.', ' ');
	}


    /**
     * @param $products
     * @return array
     */
    public function ajaxResponse($products)
	{
		return [
			'products' => view('frontend.partials.products.filtered_products', compact('products'))->render(),
			'pagination' => view('frontend.partials.products.pagination_template', compact('products'))->render()
		];
	}


    /**
     * @param $filters
     * @return mixed
     */
    public function prepareFiltersRequest($filters)
	{
		if(!$filters) return $filters;


		foreach ($filters as $key => &$filter) {
			if(empty($filter['value'])){
				unset($filters[$key]); continue;
			}
			$value = FilterValue::where('filter_id', $filter['filter_id'])->where('value', $filter['value'])->first();
			
			$filter['filter_value_id'] = count($value) ? $value->id : FilterValue::create($filter)->id;
			unset($filter['value']);
		}
		return $filters;
	}
}