<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['namespace'=>'App\Http\Controllers'],function(){

    Route::get('/logout', 'Auth\LoginController@logout');
    Route::auth();

});


Route::get('glide/{path}', function($path){
	$server = \League\Glide\ServerFactory::create([
		'source' => app('filesystem')->disk('public')->getDriver(),
		'cache' => storage_path('glide'),
	]);
	return $server->getImageResponse($path, Input::query());
})->where('path', '.+');