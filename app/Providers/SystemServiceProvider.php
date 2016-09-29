<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{
	protected $providers = [
		//'App\Providers\ViewComposersServiceProvider',
//		DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
		\Laracasts\Generators\GeneratorsServiceProvider::class,
		\Illuminate\Html\HtmlServiceProvider::class,
		\Intervention\Image\ImageServiceProvider::class,
		\Barryvdh\Elfinder\ElfinderServiceProvider::class,
		BreadcrumbsServiceProvider::class,
	];

	protected $providerAliases = [
		//'Carbon'	=> 'Carbon\Carbon',
		'HTML'		=> 'Illuminate\Html\HtmlFacade',
		'Form'		=> 'Illuminate\Html\FormFacade',
		'Html'		=> 'Illuminate\Html\HtmlFacade',
		'Image'     => 'Intervention\Image\Facades\Image',
		'Breadcrumbs' => 'DaveJamesMiller\Breadcrumbs\Facade',
	];

	public function register()
	{
		/*
		 * Register the service provider for the dependency.
		 */
		foreach($this->providers as $provider) {
			$this->app->register($provider);
		}

		/*
		 * Create aliases for the dependency.
		 */
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();

		foreach($this->providerAliases as $alias=>$provider) {
			$loader->alias($alias, $provider);

		}
	}
}