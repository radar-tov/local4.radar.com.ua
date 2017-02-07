<?php

Route::group(['middleware' => ['permissions','handleSlug'],'namespace'=>'\App\Http\Controllers\Server'], function() {

    Route::group(['prefix'=>'server'], function () {
        /* TWITTER */
        Route::post('send', 'TwitterController@send');
        /* /end TWITTER */
    });

});

