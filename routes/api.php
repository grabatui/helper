<?php

use Illuminate\Http\Request;

Route::group([
    'as' => 'api.',
    'namespace' => 'Api',
], function () {
    Route::get('/movie/search', 'Movie@search')->name('search');
});
