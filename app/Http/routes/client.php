<?php

if( ! Request::is('dashboard*') and ! Request::is('auth*')){


	/* Add review on front page */
    Route::post('add/review',['uses'=>'\App\Http\Controllers\Admin\ReviewsController@store','as'=>'add.review']);

	Route::group(['namespace' => '\App\Http\Controllers\Frontend', 'middleware' => 'bot'], function()
	{
		Route::get('rate', 'FrontendController@rateProduct');

		Route::get('/', 'FrontendController@index');

		Route::get('stati',['uses'=>'InformationController@getPage','as'=>'frontend.page']);
		Route::get('stati/{slug}',['uses'=>'InformationController@getArticle','as'=>'frontend.article']);

		/* send mail from site */
		Route::post("mail/me",["uses"=>"MailController@mailMe",'as'=>'mail.me']);

        Route::get('compare','FrontendController@compare');
		Route::get('cart', ['as' => 'cart', 'uses' => 'FrontendController@cart']);
		Route::post('buy', 'FrontendController@buy');
		Route::get('thank-you', 'FrontendController@thanks');
		Route::get('otvet', 'FrontendController@otvet');
		Route::get('callbeck', ['as' => 'callbeck', 'uses' => 'FrontendController@callbeck']);
		Route::get('montagniki', ['as' => 'montagniki', 'uses' => 'FrontendController@montagniki']);
		Route::get('comment/{id}', ['as' => 'comment', 'uses' => 'FrontendController@comment']);

		Route::get('sitemap_page', 'FrontendController@getSitemapPages');
		Route::get('sitemap_stati', 'InformationController@getSitemapStati');
		Route::get('sitemap_categories', 'FrontendController@getSitemapCategories');
		Route::get('sitemap_products', 'FrontendController@getSitemapProducts');

		Route::get('yandex/yandex_products', 'FrontendController@getYandexProducts');

		Route::get('new', ['as' => 'new', 'uses' => 'FrontendController@newProducts']);
		Route::get('sale', ['as' => 'sale', 'uses' => 'FrontendController@saleProducts']);
		Route::get('contacts', ['as' => 'contacts', 'uses' => 'FrontendController@contacts']);
	    
	    Route::get('pages-{slug}','FrontendController@staticPage');
	    
		Route::get('service', ['as' => 'service', 'uses' => 'FrontendController@staticPage']);
		Route::get('about', ['as' => 'about', 'uses' => 'FrontendController@staticPage']);
		Route::get('delivery',['as'=>'delivery','uses'=>'FrontendController@staticPage']);
		Route::get('proizvoditeli',['as'=>'proizvoditeli','uses'=>'FrontendController@staticPage']);
		Route::get('garantiya',['as'=>'garantiya','uses'=>'FrontendController@staticPage']);
        

		Route::get('login', ['as' => 'login', 'uses' => 'FrontendController@login']);
		Route::get('registration', ['as' => 'register', 'uses' => 'FrontendController@registration']);
		Route::get('password', ['as' => 'password', 'uses' => 'FrontendController@']);
		Route::get('password_modal', ['as' => 'password_modal', 'uses' => 'FrontendController@password_modal']);
		Route::get('cabinet', ['as' => 'cabinet', 'uses' => 'FrontendController@cabinet']);
		Route::get('search', ['as' => 'search', 'uses' => 'FrontendController@search']);

		Route::post('user_update', ['as' => 'user_update', 'uses' => 'FrontendController@updateUserData']);
		Route::get('cabinet/orders/{order_id}', ['as' => 'order', 'uses' => 'FrontendController@showOrder']);

		Route::get('{categorySlug}', 'FrontendController@catalog');
		Route::get('{categorySlug}/{subcategorySlug}', 'FrontendController@catalog');
		Route::get('{categorySlug}/{subcategorySlug}/{productSlug}', 'FrontendController@product');
        Route::post('add_to_compare','CartController@addToCompare');
		Route::post('add_to_cart', 'CartController@addProduct');
		Route::post('addKol_to_cart', 'CartController@addKolProduct');
		Route::post('add_set_to_cart', 'CartController@addSetOfProducts');
		Route::post('cart/get_content', 'CartController@getContent');
		Route::post('cart/get_to_compare','CartController@getToCompare');
		Route::post('cart/update_item', 'CartController@updateItem');
		Route::post('cart/delete_item', 'CartController@deleteItem');
		Route::post('cart/delete_from_compare','CartController@deleteItemFromCompare');

	});

}
