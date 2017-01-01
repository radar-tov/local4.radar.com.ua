<?php

//get('/dashboard/test',function(){
//
//	dd(\File::getRemote('http://lorempixel.com/400/200/sports/'));
//	$upload = new App\Services\BackupFilesUpload();
//
//});

Route::group(['middleware' => ['permissions','handleSlug'],'namespace'=>'\App\Http\Controllers\Admin'], function() {

	Route::group(['prefix'=>'dashboard'], function () {

		// Images
		post('products/{id}/images/add',['as'=>'dashboard.products.images', 'uses'=>'ProductsController@images']);
		//copy
		get('products/copy/{id}',['as' => 'dashboard.products.copy', 'uses' => 'ProductsController@copyProduct']);
		// Trash
		get('products/trash',['as'=>'dashboard.products.trash', 'uses'=>'ProductsController@trash']);
		get('products/{id}/trash',['as'=>'dashboard.products.trash.restore', 'uses'=>'ProductsController@restore']);
		Route::delete('products/{id}/trash',['as'=>'dashboard.products.trash.remove', 'uses'=>'ProductsController@remove']);
		// Drafts
		get('products/drafts',['as'=>'dashboard.products.drafts', 'uses'=>'ProductsController@drafts']);

		get('transfer/rollback',['as'=>'dashboard.transfer.rollback','uses'=>'TransferController@rollback']);
		get('transfer/export',['as'=>'dashboard.transfer.export','uses'=>'TransferController@export']);
		resource('transfer','TransferController');
		/**
		 * Products routes begin
		 * */
		post('product-actions/getProductsBySale','ProductsController@getProductsBySale');
		post('product-actions/getProductsForSale','ProductsController@getProductsForSale');
		post('product-actions/getRelatedProducts','ProductsController@getRelatedProducts');
		post('product-actions/syncRelated','ProductsController@syncRelatedProducts');
		get('product-actions/getProducts','ProductsController@getProducts');
		post('product-actions/delete','ProductsController@massDelete');
		post('product-actions/deactivate','ProductsController@massDeactivate');
		post('product-actions/activate','ProductsController@massActivate');
		post('product-actions/markAsBestseller','ProductsController@massMarkAsBestseller');
		post('product-actions/unmarkAsBestseller','ProductsController@massUnmarkAsBestseller');
		post('product-actions/markAsNew','ProductsController@massMarkAsNew');
		post('product-actions/unmarkAsNew','ProductsController@massUnmarkAsNew');
		post('product-actions/dropDiscount','ProductsController@massDropDiscount');
		post('product-actions/stock-products','ProductsController@getStockProducts');
		get('products/trash',['as'=>'dashboard.products.trash', 'uses'=>'ProductsController@trash']);
		post('get-products', 'ProductsController@getProducts');
		Route::delete('products/destroy-from-trash/{product_id}', 'ProductsController@destroyFromTrash');
		get('products/restore-from-trash/{product_id}', 'ProductsController@restoreFromTrash');
		resource('products', 'ProductsController');

		/**
		* Products routes end
		* */

//		get('get_ordered_products', 'OrderedProductsController@getProductsByOrder');
		delete('destroy_ordered_product/{product_id}', 'OrderedProductsController@destroy');

		resource('orders', 'OrdersController');
		resource('shipments', 'ShipmentMethodsController');
		resource('payments', 'PaymentMethodsController');
		resource('groups', 'CustomerGroupsController');
		resource('brands', 'BrandsController');
		resource('sales', 'SalesController');
		resource('stock', 'StockController');

		get('users/search',['as'=>'dashboard.users.search','uses'=>'UsersController@search']);

		resource('users', 'UsersController');

		resource('pages', 'PagesController');
		resource('static_pages', 'StaticPagesController');
		resource('articles', 'ArticlesController');
		resource('sliders', 'SlidersController');
		resource('slider2','Slider2Controller');
		post('categories/order', ['as' => 'dashboard.categories.order', 'uses' => 'CategoriesController@order']);
		resource('categories', 'CategoriesController');
		resource('banners', 'BannersController');

		get('reviews/search',['as'=>'dashboard.reviews.search','uses'=>'ReviewsController@search']);
		resource('reviews', 'ReviewsController');

		post("categories/get-fields/{category_id}", "CategoriesController@loadCategoryFields");

		get('helpers/translate','HelperControllers@translate');

		/**
		 * Images routes
		 * */
		post("upload-image", "ProductImagesController@uploadImage");
		post("get-images/{accommodation_id}", "ProductImagesController@getProductImages");
		post("remove-image/{image_id}", "ProductImagesController@removeImage");
		post("set-thumbnail/{image_id}", "ProductImagesController@setThumbnail");
		post("remove-flash/{product_id}", "ProductsController@removeFlash");


		get('elfinder-popup/{input_id}',
			['as' => 'dashboard.elfinder-popup',
				'uses' => '\Barryvdh\Elfinder\ElfinderController@showPopup'
			]
		);


		get('/index',['as'=>'dashboard.index','uses'=>'DashboardController@getIndex']);
		put('/{id}',['as'=>'dashboard.update','uses'=>'DashboardController@putIndex']);

		/* PDF */
		post("upload-pdf","ProductsController@uploadPDF");
		post("remove-pdf", "ProductsController@removePDF");
		get("pdf", 'PdfController@index');
		get("pdf/add/{categoryID}/{id}", 'PdfController@show');
		get("pdf/{id}/{productID}", 'PdfController@edit');
		post("pdf", 'PdfController@update');
		post("pdf/addfile", 'PdfController@store');
		/* /end PDF */

		/* PARAMETERS */
		get("parameters/add/{categoryID}/{brandID}/{productID}", ['as'=>'dashboard.parameters.add','uses'=>'ParametersController@create']);
		post("parameters/addparams", ['as'=>'dashboard.parameters.addparams','uses'=>'ParametersController@addparams']);
		get("parameters/selection/{categoryID}/{brandID}/{productID}", ['as'=>'dashboard.parameters.selection','uses'=>'ParametersController@index']);
		post("parameters/save", ['as'=>'dashboard.parameters.save','uses'=>'ParametersController@saveParams']);
		get("parameters/list", ['as'=>'dashboard.parameters.list','uses'=>'ParametersController@show']);
		get("parameters/edit_value/{productID}/{parameterID}", ['as'=>'dashboard.parameters.edit_value','uses'=>'ParametersController@edit']);
		post("parameters/save_value", ['as'=>'dashboard.parameters.save_value','uses'=>'ParametersController@save_value']);
		post("parameters/getvalue", ['as'=>'dashboard.parameters.getvalue','uses'=>'ParametersController@getvalue']);
		get("parameters/edit_param/{paramID}", ['as'=>'dashboard.parameters.edit_param','uses'=>'ParametersController@edit_param']);
		post("parameters/save_param", ['as'=>'dashboard.parameters.save_param','uses'=>'ParametersController@save_param']);
		post("parameters/delete", ['as'=>'dashboard.parameters.delete','uses'=>'ParametersController@delete']);
		/* /end PARAMETER */

		/* FILTERS */
		post('values/{id}/filter',['as'=>'dashboard.values.filter', 'uses'=>'FiltersValuesController@fetchByFilter']);
		post('values/order',['as'=>'dashboard.values.order', 'uses'=>'FiltersValuesController@order']);
		post('filters/get', 'FiltersController@getFilters');
		resource('filters', 'FiltersController');
		resource('values', 'FiltersValuesController');
		/* /end FILTERS */

		/* CHRACTERISTICS */

//		post('characteristics', 'CharacteristicsController@createCharacteristic');
//		post('characteristics_list', 'CharacteristicsController@getCharacteristics');
//		get('characteristics/{category_id}', 'CharacteristicsController@getCharacteristicsForCategory');
//		put('characteristics/{id}', 'CharacteristicsController@updateCharacteristic');
//		delete('characteristics/{id}', 'CharacteristicsController@deleteCharacteristic');

		post('characteristics_value/{id}/characteristics',['as'=>'dashboard.values.characteristics', 'uses'=>'CharacteristicsValuesController@fetchByCharacteristic']);
        post('characteristics_value/order',['as'=>'dashboard.characteristics_value.order', 'uses'=>'CharacteristicsValuesController@order']);
        post('characteristics/get', 'CharacteristicsController@getCharact');
		resource('characteristics', 'CharacteristicsController');
		resource('characteristics_value', 'CharacteristicsValuesController');

		/* /end CHRACTERISTICS */
	});

});

