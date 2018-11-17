<?php

Route::group([
    'as' => 'api.',
    'namespace' => 'Api',
], function () {
    Route::get('/movie/queue', 'Movie@queue')->name('queue');
    Route::get('/movie/search', 'Movie@search')->name('search');

    Route::post('/movie/{movie}/watch', 'Movie@watch');
    Route::post('/movie/{movie}/opinion', 'Movie@opinion');
});
