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
                Route::post('/login', 'Login@login')->name('auth');
                Route::post('/register', 'Register@register')->name('register');
            }
        );
    }
);
