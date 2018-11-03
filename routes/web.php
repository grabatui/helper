<?php

Route::get('/', 'Controller@index');

Route::post('/movies/add/{id}', 'Controller@add');
Route::delete('/movies/delete/{id}', 'Controller@delete');
