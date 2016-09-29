<?php

namespace App\ViewDataProviders;

use Illuminate\Support\Facades\File;

class FileDataProvider {


	public function getIconsList()
	{
		$files = [];
		foreach (File::allFiles(public_path('frontend/images')) as $route) {
			if( preg_match('/icon-cat_\d+\.png/', $route->getRelativePathname()))
				$files[] = $route->getRelativePathname();
		}
		return $files;
	}

}