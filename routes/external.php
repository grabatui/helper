<?php

Route::group(
    [
        'as' => 'external.',
    ],
    function () {
        Route::domain('https://www.kinopoisk.ru')->as('kp.')->group(function () {
            Route::get('/film/{id}/')->name('detail');
        });

        Route::domain('https://rutracker.org')->as('rt.')->group(function () {
            Route::get('/forum/tracker.php?nm={search}')->name('search');
        });
    }
);
