<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    //
    public function store($tweet_id, Request $request)
    {
        Comment::create([
            'user_number' => Auth::user()->id,
            'tweet_number' => $tweet_id,
            'text' => $request->text,
        ]);

        return redirect("tweets/{$tweet_id}");
    }
}
