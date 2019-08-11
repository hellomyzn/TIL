<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    //
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
            'name' => $request->name,
            'image' => $request->image,
            'text' => $request->text,

        ]);

        return view('tweets.store');
    }
}
