<?php
namespace App\Models;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'order',
		'parent_id',
		'deep',
		'user_id',
		'show',
		'title',
		'slug',
		'thumbnail',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'icon',
		'header',
		'description',
		'in_footer',
		'is_import',

		'thumb_alt',
		'thumb_desc',
		'thumb_link',
	];

	public static function findOrCreate($title = '')
	{
		$category = null;

		if($title) {
			$category = static::where('title','like',$title)->first();
			if(count($category)) {
				return $category->id;
			}
			$category = static::create(['title'=>$title,'slug'=>str_slug($title,'-')]);

			return $category->id;
		}

		return 0;
	}

	/**
	 * @return mixed
	 */
	public function children()
	{
		return $this->hasMany('App\Models\Category','parent_id')->orderBy('order');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function parent()
	{
		return $this->belongsTo('App\Models\Category','parent_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		return $this->hasMany('App\Models\Product');
	}

	/**
	 * @return $this
	 */
	public function fields()
	{
		return $this->belongsToMany(Filter::class,'category_filter')
			->withPivot('is_filter','order','show')
			->orderBy('category_filter.order');
	}

	/**
	 * Alias for filters
	 */
	public function strain($id = 0)
	{
		return $this->belongsToMany(Filter::class, 'category_filter')
			->withPivot('order', 'is_filter')
			->where('is_filter', true)
			->orderBy('category_filter.order')
			->with('values');
	}

	public function filtersWithRelevantValues($categoryId)
	{
		return $this->belongsToMany(Filter::class, 'category_filter')
			->withPivot('order', 'is_filter')
			->where('is_filter', true)
			->orderBy('category_filter.order')
			->has('values', '>', 0)
			->with(['values' => function($val) use($categoryId){
				$val->whereHas('products', function($product) use($categoryId){
					$product->where('category_id', $categoryId);
				});
			}]);
	}

	/**
	 * @return mixed
	 */
	public function filters()
	{
		return $this->belongsToMany(Filter::class,'category_filter')->withPivot('is_filter')->where('is_filter', 1);
	}

	/**
	 * @param $productId
	 * @return mixed
	 */
	public function fieldsForProduct($productId)
	{
		return $this->hasMany('App\Models\Characteristic')
			->leftJoin('characteristic_values', 'id', '=', $productId);
	}

}
