<?php

use App\Http\Controllers\Laracasts\LaracastsRegisterController;
use App\Http\Controllers\Laracasts\SessionsController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::group([
        'namespace'     => 'Auth', 
        'as'            => 'auth.',
    ], function () {
        Route::group(['middleware' => 'guest'], function(){
            Route::get('register', [LaracastsRegisterController::class, 'create'])->name('register.create');
            Route::post('register', [LaracastsRegisterController::class, 'store'])->name('register.store');
            
            Route::get('login', [SessionsController::class, 'create'])->name('login.create');
            Route::post('login', [SessionsController::class, 'store'])->name('login.store');
        });
        Route::group(['middleware' => 'auth'], function(){
            Route::post('logout', [SessionsController::class, 'destroy'])->name('logout');
        });
    }
);    
    

