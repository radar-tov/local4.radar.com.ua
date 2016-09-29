<?php

namespace App\Models;

use App\Models\Stock;
use App\ProductRate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Eloquent {
	use SoftDeletes;
	use LocalizedEloquentTrait;

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * @var
	 */
	protected static $prevProductSlug;
	/**
	 * @var
	 */
	protected static $nextProductSlug;
	/**
	 * @var array
	 */
	protected $fillable = [
		'category_id',
		'label_id',
		'user_id',
		'filter_value_id',
		'draft',
		'rating',
		'pack',
		'video',
		'available',
		'flash_view',
		'article',
		'price',
		'discount',
		'slug',
		'title',
		'active',
		'excerpt',
		'body',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'pdf',
		'is_bestseller',
		'is_stock',
		'is_new',
		'brand_id',
		'is_import',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category() {
		return $this->belongsTo('App\Models\Category');
	}

	/**
	 * @return mixed
	 */
	public function images() {
		return $this->belongsToMany('App\Models\Image', 'product_product_image', 'product_id', 'product_image_id')
			->orderBy('is_thumb', 'desc');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function relImages() {
		return $this->belongsToMany('App\Models\Image', 'product_product_image', 'product_id', 'product_image_id');
	}

	/**
	 * @return mixed
	 */
	public function thumbnail() {
		return $this->belongsToMany('App\Models\Image', 'product_product_image', 'product_id', 'product_image_id')
			->where('is_thumb', true);
	}

	/**
	 * @param $query
	 * @param $type
	 * @return mixed
	 */

	public function scopeIsDraft($query, $type) {
		return $query->where('draft', $type);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function brand() {
		return $this->belongsTo(Brand::class);
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeActive($query) {
		return $query->where('draft', 0)->where('active', 1);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function characteristicsValues() {
		return $this->hasMany('App\Models\CharacteristicValue');
	}

	/**
	 * @return mixed
	 */
	public function relatedProducts() {
		return $this->belongsToMany(static::class, 'product_product', 'product_id', 'related_product_id')
			->visible()->withRelations();
	}

	/**
	 * @return mixed
	 */
	public function characteristics() {
		return $this->hasMany('App\Models\CharacteristicValue')->where('value', '!=', '')
			->leftJoin('characteristics', 'characteristic_values.characteristic_id', '=', 'characteristics.id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function sale() {
		return $this->belongsToMany(Sale::class);
	}

	/**
	 * @return mixed
	 */
	public function relevantSale() {
		return $this->belongsToMany(Sale::class)
			->where(function ($query) {

				$query->has('customerGroups', '=', '0')
					->orWhereHas('customerGroups', function ($group) {
						$user = Auth::user();
						if ($user) {
							$user->load('customerGroups');
						}

						$group->whereIn('id', isset($user->customerGroups) ? $user->customerGroups->lists("id")->all() : []);
					});

			})
			->actualSale();
	}

	/**
	 * @return bool
	 */
	public function hasDiscount() {
		if ($this->discount > 0 || (count($this->relevantSale) && $this->relevantSale->first()->discount > 0)) {
			return true;
		}

		return false;
	}

	/**
	 * @return string
	 */
	public function getNewPrice() {

		if ((count($this->relevantSale) && $this->discount > $this->relevantSale->first()->discount)) {
			$price = $this->price - ($this->price / 100 * $this->discount);
		} elseif (count($this->relevantSale) && $this->relevantSale->first()->discount > 0) {
			$price = $this->price - ($this->price / 100 * $this->relevantSale->first()->discount);
		} else {
			$price = $this->price - ($this->price / 100 * $this->discount);
		}

		return number_format($price, 0, '', ' ');
	}

	/**
	 * @return int|mixed
	 */
	public function getDiscount() {
		if ($this->hasDiscount()) {
			if ((count($this->relevantSale) && $this->discount > $this->relevantSale->first()->discount)) {
				return $this->discount;
			} elseif (count($this->relevantSale) && $this->relevantSale->first()->discount > 0) {
				return $this->relevantSale->first()->discount;
			} else {
				return $this->discount;
			}
		}
		return 0;
	}

	/**
	 * @return string
	 */
	public function getPrice() {
		return number_format($this->price, 0, '', ' ');
	}

	/**
	 * @return string
	 */
	public function getStockPrice() {
		$price = $this->pivot->stock_price;
		return number_format($price, 0, '', ' ');
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeVisible($query) {
		return $query->where('active', true);
	}

	/**
	 * @return $this
	 */
	public function filters() {
		return $this->belongsToMany(Filter::class)->withPivot('filter_value_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function filterValues() {
		return $this->belongsToMany(FilterValue::class, 'filter_product', 'product_id', 'filter_value_id');
	}

	/**
	 * @return mixed
	 */
	public function filterValuesWithFilters() {
		return $this->belongsToMany(FilterValue::class, 'filter_product', 'product_id', 'filter_value_id')
			->with('filter.categories');
	}

	/**
	 * @param $categoryId
	 * @return mixed
	 */
	public function sortedValues($categoryId) {
		return $this->filterValuesWithFilters->sortBy(function ($product, $key) use ($categoryId) {
			$cat = $product->filter->categories->where('id', $categoryId)->first();
			if (count($cat)) {
				return $cat->pivot->order;
			}

		});
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeWithRelations($query) {
		return $query->with(
			'relevantSale', 'thumbnail', 'characteristics',
			'category', 'rates', 'filterValuesWithFilters',
			'stocks.products');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function rates() {
		return $this->belongsToMany(ProductRate::class, 'product_rate_product');
	}

	/**
	 * @return mixed
	 */
	public function reviews() {
		// only moderation reviews
		return $this->hasMany(Review::class)->where('active', 1);
	}

	/**
	 * @param $query
	 * @param $request
	 * @return mixed
	 */
	public function scopeSearchable($query, $request) {
//		dd( $request->get('categoryId') ?: 'LIKE','%');
		$search = $request->get('search');
		return $query->where('category_id', $request->get('categoryId') ?: 'LIKE', '%')
			->whereRaw(getDiscountValue($request))
			->where(function ($product) use ($search) {
				$product->where('article', 'LIKE', '%' . $search . '%')
					->orWhere('title', 'LIKE', '%' . $search . '%');
			});

	}

	/**
	 * @param $query
	 * @param $request
	 * @return mixed
	 */
	public function scopeBySale($query, $request) {

		if ($request->get('selected')) {
			return $query->whereIn('id', $request->get('selected'));
		}

		return $query->whereHas('sale', function ($sale) use ($request) {
			$sale->where('id', $request->get('saleId'));
		});
	}

	/**
	 * @param array $attributes
	 * @param array $attachments
	 * @return mixed
	 */
	public static function createOrUpdate($attributes = [], $attachments = []) {
		if (array_get($attributes, 'article') || array_get($attributes, 'title')) {
			if ($product = static::where('article', $attributes['article'])->first()) {
				$product->destroyAttachments();
				return $product->update($attributes)->images()->sync($attachments);
			} else if ($product = static::where('title', 'like', $attributes['title'])->first()) {
				$product->destroyAttachments();
				return $product->update($attributes)->images()->sync($attachments);
			}
		}

		return static::create($attributes)->images()->sync($attachments);
	}

	/**
	 * @return bool
	 */
	protected function destroyAttachments() {
		foreach ($this->relImages()->get() as $image) {
			//$path = public_path($image->path);
			//if(is_file($path))@unlink($path);
			$image->delete();
		}

		return true;
	}

	/**
	 * @return null
	 */
	public function nextProductSlug() {
		if (!self::$nextProductSlug) {
			$products = Product::where('category_id', $this->category_id)
				->visible()
				->where('price', '>=', $this->price)
				->limit(15)
				->orderBy('price')
				->orderBy('id')
				->select('id', 'slug', 'price')
				->get();

			$nextProductKey = null;
			foreach ($products as $key => $product) {
				if ($product->id == $this->id) {
					$nextProductKey = $key + 1;
				}
			}
//			dd($products[$nextProductKey]->toArray());
			//			dd($products->toArray());
			if (!isset($products[$nextProductKey])) {
				return null;
			}

			self::$nextProductSlug = $products[$nextProductKey]->slug;
		}
		return self::$nextProductSlug;
	}

	/**
	 * @return null
	 */
	public function prevProductSlug() {
		if (!self::$prevProductSlug) {
			$products = Product::where('category_id', $this->category_id)
				->where('price', '<=', $this->price)
				->orderBy('price')
				->orderBy('id')
				->visible()
//				->limit(15)
				->select('slug', 'id')
				->get();

			$nextProductKey = null;
			foreach ($products as $key => $product) {
				if ($product->id == $this->id) {
					$nextProductKey = $key - 1;
				}
			}			if (!isset($products[$nextProductKey])) {
				return null;
			}

			self::$prevProductSlug = $products[$nextProductKey]->slug;
		}
		return self::$prevProductSlug;
	}

	/**
	 * @param $query
	 * @param $request
	 * @return mixed
	 */
	public function scopeOrdered($query, $request) {
		$order = $request->get('orderBy') ?: 'price:asc';
		$ord = explode(':', $order);
		$field = $ord[0];
		$flag = $ord[1];
		return $query->orderBy($field, $flag);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function clones() {
		return $this->hasMany(self::class, 'clone_of');
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeOriginal($query) {
		return $query->where('clone_of', 0);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function stocks() {
		return $this->belongsToMany(Stock::class)->where('active', true)->withPivot(['is_main', 'stock_price']);
	}

	public function gifts()
	{
		return $this->belongsToMany(Stock::class)->withPivot(['is_main', 'stock_price']);
	}

	/**
	 * @return Eloquent\Collection
	 */
	public function getStocksForProduct() {
		$id = $this->clone_of ?: $this->id;
		$stocks = Stock::whereHas('products', function ($product) use ($id) {
			$product->where('id', $id);
		})->with('uniqueProducts')->where('active', true)->get();

		return $stocks;
	}

	/**
	 * @return bool
	 */
	public function stockPriceLessThenDiscountPrice() {
		if (str_replace(' ', '', $this->getNewPrice()) > str_replace(' ', '', $this->getStockPrice())) {
			return true;
		}

		return false;
	}

}

