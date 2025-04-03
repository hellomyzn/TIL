<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;

class PutController extends Controller
{    
    /**
     * __invoke
     *
     * @param  mixed $request
     * @param  mixed $tweetService
     * @return void
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        if (!$tweetService->isOwnTweet($request->user()->id, $request->id())){
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
            ->route('tweet.update.index', ['tweetId' => $tweet->id])
            ->with('feedback.success', 'Success to edit.');
    }
}
