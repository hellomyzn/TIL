<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('daily', 'ArticleController@index_daily');

Route::get('daily/create', 'ArticleController@create_daily');
Route::post('daily/', 'ArticleController@store_daily');



Route::get('weekly', 'ArticleController@index_weekly');

Route::get('weekly/create', 'ArticleController@create_weekly');
Route::post('weekly/', 'ArticleController@store_weekly');



Route::get('monthly', 'ArticleController@index_monthly');

Route::get('monthly/create', 'ArticleController@create_monthly');
Route::post('monthly/', 'ArticleController@store_monthly');
