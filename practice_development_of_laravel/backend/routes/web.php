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


// # Section 1

// Route::get('hello/', 'HelloController@index');

// Route::get('/hello/index_name', 'HelloController@index_name')->name('HI');
// Route::get('/hello/other', "HelloController@index_other");

// Route::get('hello/index_id/{id}', 'HelloController@index_id')->where('id', '[0-9]+');
// Route::get('hello/index_hello', 'HelloController@index_hello')->middleware('hello');
// Route::get('hello/index_bye', 'HelloController@index_bye')->middleware('hello');

// Route::namespace('Sample')->group(function() {
//     Route::get('/sample', "SampleController@index");
//     Route::get('sample/index_config', 'SampleController@index_config');
// });

// Route::get('hello/index_model/{person}', 'HelloController@index_model');

// Route::get('hello/index_config', 'HelloController@index_config');
// Route::get('hello/index_env', 'HelloController@index_env');
// Route::get('hello/index_storage', 'HelloController@index_storage');
// Route::get('hello/index_public', 'HelloController@index_public');

// Route::get('hello/index_storage_delete', 'HelloController@index_storage_delete');
// Route::get('hello/index_download_page', "HelloController@index_download_page");
// Route::get('hello/index_download', 'HelloController@index_download');

// Route::get('hello/index_upload',"HelloController@index_upload");
// Route::post('hello/index_upload', 'HelloController@index_save');
// Route::post('hello/index_upload_as', 'HelloController@index_save_as');

// Route::get('hello/index_allfiles',"HelloController@index_allfiles");

// Route::get('hello/index_request', 'HelloController@index_request');
// Route::post('hello/index_request', 'HelloController@index_request');

// Route::get('hello/index_response', 'HelloController@index_response');

// Route::get('hello/index_old', 'HelloController@index_old');
// Route::post('hello/index_old', 'HelloController@index_old');

// Route::get('hello/index_query', 'HelloController@index_query');
// Route::post('hello/index_query', 'HelloController@index_query');


# Section2
Route::get('hello/index_service', "HelloController@index_service");
Route::get('hello/index_app', "HelloController@index_app");
Route::get('hello/index_service_paramater/{id}', "HelloController@index_service_paramater");
Route::get('hello/index_service_clojure/{id}', "HelloController@index_service_clojure");
Route::get('hello/index_singleton', "HelloController@index_singleton");
Route::get('hello/index_interface', "HelloController@index_interface");
