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
        /* SMS  turbosms.ua */
        Route::post('sms/send', 'SmsController@send');
    });

});

