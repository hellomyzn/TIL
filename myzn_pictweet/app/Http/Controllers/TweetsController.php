<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;
use Auth;

class TweetsController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'DESC')->paginate(5);

        return view('tweets.index')->with('tweets', $tweets);
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function store(Request $request)
    {
        Tweet::create([
            'image' => $request->image,
            'text' => $request->text,
            'user_number' => Auth::user()->id,

        ]);

        return view('tweets.store');
    }

    public function edit($tweet_id)
    {
        $tweet = Tweet::find($tweet_id);
        return view('tweets.edit')->with('tweet', $tweet);
    }

    public function update($tweet_id, Request $request)
    {
        if(Auth::user()->id == Tweet::find($tweet_id)->user_number)
        {
            Tweet::find($tweet_id)->update([
                'image' => $request->image,
                'text' => $request->text
            ]);

        }

        return view('tweets.update');
    }


    public function destroy($tweet_id)
    {
        if(Auth::user()->id == Tweet::find($tweet_id)->user_number)
        {
            Tweet::destroy($tweet_id);
        }
        return view('tweets.destroy');
    }

    public function show($tweet_id)
    {
        $tweet = Tweet::find($tweet_id);
        $comments = Comment::where('tweet_number', $tweet_id)->orderBy('created_at', 'DESC')->get();
        return view('tweets.show')->with(['tweet' => $tweet, 'comments' => $comments]);
    }
}
