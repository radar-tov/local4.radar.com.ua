<?php

namespace App\ViewDataProviders;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoriesDataProvider {

	public static $listForNav = null;

	public function getCategoriesList()
	{
        return Category::orderBy('title')->pluck('title', 'id');
	}

    public function getCategoriesListNav()
    {
        return Category::where('parent_id',0)
            ->with('children')
            ->visible()
            ->orderBy('order')->get();
    }

	public function getListForNav()
	{
		if(self::$listForNav) return self::$listForNav;

		self::$listForNav = Category::where('parent_id',0)
										->with(array('children' => function($query)
										{
											$query->where('show', '=', 1);
										}))
										->visible()
										->orderBy('order')->get();

		return static::$listForNav;
	}


	public function getListForFooter()
	{
		return Cache::remember('footerCategories', 15,function(){
			return Category::visible()
					->where('in_footer', true)
					->where('parent_id', 0)
					->limit(8)
					->orderBy('order', 'asc')
					->get();
		});
	}


}