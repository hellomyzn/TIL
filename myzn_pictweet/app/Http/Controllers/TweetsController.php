<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetsController extends Controller
{
    //
    public function index()
    {
        return view('tweets.index');
    }

    public function create()
    {
        retrun view('tweets.create');
    }
}
