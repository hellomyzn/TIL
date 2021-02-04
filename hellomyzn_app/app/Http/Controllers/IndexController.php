<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        $posts->load('user');

        return view('pages.index', compact('posts'));
    }
}
