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


Route::group(['middleware' => ['web']], function(){
    Route::get('blog/{slug}', ['as' => 'blogs.single', 'uses' => 'BlogController@getSingle']);
    Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
    Route::get('contact', 'PageController@getContact');
    Route::post('contact', 'PageController@postContact');
    Route::get('about', 'PageController@getAbout');
    Route::get('/', 'PageController@getIndex')->name('/');
    Route::resource('posts', 'PostController');

});

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']] );

// Tag
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments
Route::post('comment/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::get('comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
Route::put('comment/{id}/', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
Route::delete('comment/{id}/', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
Route::get('comment/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
