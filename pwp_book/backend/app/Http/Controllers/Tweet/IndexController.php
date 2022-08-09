<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;

class IndexController extends Controller
{    
    /**
     * __invoke
     *
     * @param  mixed $request
     * @param  mixed $factory
     * @return void
     */
    public function __invoke(Request $request, Factory $factory)
    {
        // return View::make('tweet.index', ['name' => 'laravel']);
        // return $factory->make('tweet.index', ['name' => 'laravel']);
        // return view('tweet.index')->with('name', 'laravel');
        return view('tweet.index')->with('name', 'laravel')->with('version', '8');
    }
}
