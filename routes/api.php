<?php

Route::group(
    [
        'as' => 'api.',
        'namespace' => 'Api',
    ],
    function () {
        Route::group(
            [
                'prefix' => 'user',
            ],
            function () {
                Route::post('/auth', 'User@auth')->name('auth');
                Route::post('/register', 'User@register')->name('register');
            }
        );
    }
);
