<?php

use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function(){
    return view('simablog.home');
});