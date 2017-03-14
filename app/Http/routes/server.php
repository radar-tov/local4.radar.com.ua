<?php

Route::group(['middleware' => ['permissions','handleSlug'],'namespace'=>'\App\Http\Controllers\Server'], function() {

    Route::group(['prefix'=>'server'], function () {

        /* для редактирования шаблонов */
        Route::get('mytemplate', ['as' => 'server.template', 'uses' => 'OfficialController@myTemplate']);

        /* Заказ из админки */
        Route::get('addzakaz', ['as' => 'server.addzakaz', 'uses' => 'OfficialController@addZakaz']);

        /* TWITTER */
        Route::post('send', 'TwitterController@send');
        /* /end TWITTER */
    });

});

