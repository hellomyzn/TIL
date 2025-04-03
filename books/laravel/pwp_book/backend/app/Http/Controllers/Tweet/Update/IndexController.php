<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use App\Models\Tweet;
use App\Services\TweetService;

class IndexController extends Controller
{
        
    /**
     * __invoke
     *
     * @param  mixed $request
     * @param  mixed $tweetService
     * @return void
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!$tweetService->isOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // if (is_null($tweet)) {
        //     throw new NotFoundHttpException('The tweet is not found');
        // }
        return view('tweet.update')->with('tweet', $tweet);
    }
}
