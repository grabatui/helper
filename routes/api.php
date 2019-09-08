<?php

Route::group(
    [
        'as' => 'api.',
        'namespace' => 'Api',
    ],
    function () {
        Route::group(
            [
                'prefix' => 'auth',
                'namespace' => 'Auth',
            ],
            function () {
                Route::post('/login', 'LoginController@login')->name('auth');
                Route::post('/register', 'RegisterController@register')->name('register');
            }
        );
    }
);
