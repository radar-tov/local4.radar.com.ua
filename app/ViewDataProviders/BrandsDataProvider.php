<?php

namespace App\ViewDataProviders;

use App\Models\Brand;

class BrandsDataProvider {

	public function getList()
	{
		return Brand::orderBy('title')->lists('title', 'id');
	}
}