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


Route::group(['namespace'=>'App\Http\Controllers\Auth'],function(){
	Route::get('auth/login', 'AuthController@getLogin');
	Route::post('auth/login', 'AuthController@postLogin');
	Route::get('auth/logout', 'AuthController@getLogout');

	// Registration routes...
	Route::get('auth/register', 'AuthController@getRegister');
	Route::post('auth/register', 'AuthController@postRegister');
	Route::controller('password','PasswordController');
//	Route::get('password/email', 'PasswordController@getEmail');
//	Route::post('password/email', 'PasswordController@postEmail');
//	Route::get('password/reset', 'PasswordController@getEmail');
});



Route::get('glide/{path}', function($path){
	$server = \League\Glide\ServerFactory::create([
		'source' => app('filesystem')->disk('public')->getDriver(),
		'cache' => storage_path('glide'),
	]);
	return $server->getImageResponse($path, Input::query());
})->where('path', '.+');