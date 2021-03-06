<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use File;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    /*public function boot(Router $router)
    {
        //

        parent::boot($router);
    }*/

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {

	    require_once app_path('Http/routes/routes.php');
        require_once app_path('Http/routes/dashboard.php');
        require_once app_path('Http/routes/server.php');
        require_once app_path('Http/routes/client.php');

//        if(is_dir(app_path('Http/routes'))) {
//            foreach (File::allFiles(app_path('Http/routes')) as $route) {
//                require_once app_path('Http/routes/'.$route->getRelativePathname());
//            }
//        } else {
//            $router->group(['namespace' => $this->namespace], function ($router) {
//                require app_path('Http/routes.php');
//            });
//        }

    }
}
