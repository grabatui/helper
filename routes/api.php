<?php

Route::group(
    [
        'as' => 'api.',
        'namespace' => 'Api',
    ],
    function () {
        Route::group(
            [
                'prefix' => 'movie',
            ],
            function () {
                Route::get('/queue', 'Movie@queue')->name('queue');
                Route::get('/watched', 'Movie@watched')->name('watched');
                Route::get('/search', 'Movie@search')->name('search');

                Route::post('/{movie}/watch', 'Movie@watch');
            }
        );
    }
);
