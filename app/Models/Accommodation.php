<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Accommodation
 * @package App\Models
 */

class Accommodation extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'likes','meta_title','meta_description','meta_keywords',
		"article", "description", "pdf", "title",
		"rooms", "space", "street",
		"city_id", "area_id", "metro_id", "floor",
		/*'house_type_id',  "house_class",*/
		'house_class_id',
        "house_number", "floors", "condition",
        "parking", "category_id", "for_rent",
		"map_code", "layout_features", "ceiling_height",
		"dressing", "bedrooms", "house_type",
		"environment", "window_view", "date_of_release",
		"security_type", "ventilation", "conditioning", "by_query",
		"price", "price_for_month", "price_for_month_m2",
		"price_rub", "price_for_month_rub", "price_for_month_m2_rub",
		"has_water", "electric_power", "levels_amount",
		"homestead_space", "gas", "water_source", "canalisation", "renter",
		"life_complex_id", "business_center_id", "show",
		"indexing", "profit", "payback_period", "year_rent_flow",
		"style_id", "year_rent", "slug",
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images()
	{
		return $this->hasMany('App\Models\AccommodationImage');
	}

	public function thumbnail()
	{
		return $this->hasMany('App\Models\AccommodationImage')->where("is_thumb", true);
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function city()
	{
		return $this->belongsTo('App\Models\City');
	}

	public function houseType()
	{
		return $this->belongsTo('App\Models\HouseType','house_type_id');
	}

	public function houseClass()
	{
		return $this->belongsTo('App\Models\HouseClass','house_class_id');
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function town()
	{
		return $this->belongsTo('App\Models\Town');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function area()
	{
		return $this->belongsTo('App\Models\Area');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function metroStation()
	{
		return $this->belongsTo('App\Models\Metro', 'metro_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function lifeComplex()
	{
		return $this->belongsTo('App\Models\LifeComplex');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function businessCenter()
	{
		return $this->belongsTo('App\Models\BusinessCenter', "business_center_id");
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function filterValues()
	{
		return $this->hasMany('App\Models\FilterValues');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function style()
	{
		return $this->belongsTo('App\Models\Style');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function complex()
	{
		return $this->belongsTo('App\Models\Complex');
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeForRent($query)
	{
		return $query->where("for_rent", true)
			->with("category","city","area","metroStation","thumbnail","images", "lifeComplex", "businessCenter", "category.fieldsToShow");
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeForSell($query)
	{
		return $query->where("for_rent", false)
			->with("category","city","area","metroStation","thumbnail","images", "lifeComplex", "businessCenter", "category.fieldsToShow");
	}

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeAny($query)
	{
		return $query->with("category","city","area","metroStation","thumbnail","images", "lifeComplex", "businessCenter", "category.fieldsToShow");
	}

	/**
	 * @param $query
	 * @param $categorySlug
	 * @return mixed
	 */
	public function scopeByCategory($query, $categorySlug)
	{
		return $query->whereHas("category", function($category) use($categorySlug){
			$category->where("slug","like",$categorySlug);
		});
	}

}
