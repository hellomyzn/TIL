<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View;
// use Illuminate\View\Factory;

use App\Services\TweetService;

class IndexController extends Controller
{    
    /**
     * __invoke
     *
     * @param  mixed $request
     * @param  mixed $factory
     * @return void
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // return View::make('tweet.index', ['name' => 'laravel']);
        // return $factory->make('tweet.index', ['name' => 'laravel']);
        // return view('tweet.index')->with('name', 'laravel');
        // return view('tweet.index')->with('name', 'laravel')->with('version', '8');
        
        $tweets = $tweetService->getTweets();
        return view('tweet.index')->with('tweets', $tweets);
    }
}
