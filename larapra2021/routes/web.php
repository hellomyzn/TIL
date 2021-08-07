<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::get('/', function () {
    logger('welcome route.');
    return view('welcome');
});

Route::get('/home', function () {
    logger('home route.');
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::group([
//     'as'         => 'auth.'
// ], function () {
//     require __DIR__."/auth.php";
// });


// for Laracasts
Route::group([
        'as'            => 'laracasts.',
        'prefix'        => 'laracasts',
], function (){
        include_route_files(__DIR__."/laracasts/"); 
    }
);

// for Simablog
Route::group([
    'as'            => 'simablog.',
    'prefix'        => 'simablog',
], function (){
        include_route_files(__DIR__."/simablog/"); 
    }
);

// for Blog Crud
Route::group([
    'as'            => 'blogcrud.',
    'prefix'        => 'blogcrud',
], function (){
        include_route_files(__DIR__."/blogcrud/"); 
    }
);


// for SimpelNote
Route::group([
    'as'            => 'simplenote.',
    'prefix'        => 'simplenote',
], function (){
        include_route_files(__DIR__."/simplenote/"); 
    }
);


Route::get('error_test', function(){
    Log::error("!!!!!!!!!!!!!! Test Error Log !!!!!!!!!!!!!!");
    return "Success to push Test Error Log";
});
