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

Route::get('daily', 'ArticleController@daily_index');

Route::get('daily/create', 'ArticleController@daily_create');
Route::post('daily/', 'ArticleController@daily_store');



Route::get('weekly', 'ArticleController@weekly_index');

Route::get('weekly/create', 'ArticleController@weekly_create');
Route::post('weekly/', 'ArticleController@weekly_store');



Route::get('monthly', 'ArticleController@monthly_index');

Route::get('monthly/create', 'ArticleController@monthly_create');
Route::post('monthly/', 'ArticleController@monthly_store');
