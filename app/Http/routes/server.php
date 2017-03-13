<?php

Route::group(['middleware' => ['permissions','handleSlug'],'namespace'=>'\App\Http\Controllers\Server'], function() {

    Route::group(['prefix'=>'server'], function () {

        /* для редактирования шаблонов */
        Route::get('mytemplate', ['as' => 'server.template', 'uses' => 'OfficialController@myTemplate']);

        /* TWITTER */
        Route::post('send', 'TwitterController@send');
        /* /end TWITTER */
    });

});

