<?php

Route::get('/cabinet', 'Controller@cabinet'); // TODO: Tmp
Route::get('/{any}', 'Controller@index')->where('any', '.*');
