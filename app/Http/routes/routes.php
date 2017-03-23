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

/*
GET|HEAD     login                   login              App\Http\Controllers\Frontend\FrontendController@login                  bot,guest
POST         login                                      App\Http\Controllers\Auth\LoginController@login                         guest
GET|HEAD     logout                                     App\Http\Controllers\Auth\LoginController@logout
POST         logout                  logout             App\Http\Controllers\Auth\LoginController@logout

POST         password/email          password.email     App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail   guest
GET|HEAD     password/reset          password.request   App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm  guest
POST         password/reset                             App\Http\Controllers\Auth\ResetPasswordController@reset                 guest
GET|HEAD     password/reset/{token}  password.reset     App\Http\Controllers\Auth\ResetPasswordController@showResetForm         guest

POST         register                                   App\Http\Controllers\Auth\RegisterController@register                   guest
GET|HEAD     register                register           App\Http\Controllers\Auth\RegisterController@showRegistrationForm       guest

GET|HEAD     password                password           App\Http\Controllers\Frontend\FrontendController@                       bot
GET|HEAD     registration            register           App\Http\Controllers\Frontend\FrontendController@registration           bot,guest
*/



});


Route::get('glide/{path}', function($path){
	$server = \League\Glide\ServerFactory::create([
		'source' => app('filesystem')->disk('public')->getDriver(),
		'cache' => storage_path('glide'),
	]);
	return $server->getImageResponse($path, Input::query());
})->where('path', '.+');