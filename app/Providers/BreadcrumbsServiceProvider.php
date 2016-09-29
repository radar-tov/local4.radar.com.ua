<?php namespace App\Providers;

use DaveJamesMiller\Breadcrumbs\ServiceProvider;
use File;

class BreadcrumbsServiceProvider extends ServiceProvider {

	// This method can be overridden in a child class
	public function registerBreadcrumbs()
	{
		// Load the app breadcrumbs if they're in app/Http/breadcrumbs folder

		foreach (File::allFiles(app_path('Http/breadcrumbs')) as $breadcrumb) {
			include_once app_path('Http/breadcrumbs/'.$breadcrumb->getRelativePathname());
		}
	}

}
