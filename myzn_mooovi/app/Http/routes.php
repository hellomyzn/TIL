<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'ProductsController@index');
    Route::get('/products/search', 'ProductsController@search');
    Route::resource('products', 'ProductsController', ['only' => 'show']);
});
