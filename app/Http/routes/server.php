<?php

Route::group(['middleware' => ['permissionsserver','handleSlug'],'namespace'=>'\App\Http\Controllers\Server'], function() {

    Route::group(['prefix'=>'server'], function () {
        /* для редактирования шаблонов */
        Route::get('mytemplate', ['as' => 'server.template', 'uses' => 'OfficialController@myTemplate']);
        /* Заказ из админки */
        Route::get('addzakaz', ['as' => 'server.addzakaz', 'uses' => 'OfficialController@addZakaz']);
        /* Данные для админке корзина и остальное */
        Route::get('getdata', ['as' => 'server.getdata', 'uses' => 'OfficialController@getdata']);
        Route::get('getonline', ['as' => 'server.getonline', 'uses' => 'OfficialController@getonline']);
        /* TWITTER */
        Route::post('send', 'TwitterController@send');

        /* NP */
        Route::post('np/tracking', 'ApiNP@tracking');
        Route::post('np/updateAreas', 'ApiNP@updateAreas');
        Route::post('np/updateCities', 'ApiNP@updateCities');

        /* SMS  turbosms.ua */
        Route::post('sms/send', 'SmsController@send');
        Route::post('sms/sendNpId', 'SmsController@sendNpId');

    });

});

