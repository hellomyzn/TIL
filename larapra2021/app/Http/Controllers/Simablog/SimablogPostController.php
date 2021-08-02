<?php

namespace App\Http\Controllers\Simablog;

use App\Models\Simablog\SimablogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimablogPostController extends Controller
{
    public function index()
    {
        $posts = SimablogPost::all();
        return view('simablog.posts.index');
    }

    public function create()
    {
        return view('simablog.posts.create');
    }

    public function show()
    {
        $posts = SimablogPost::all();
        return view('simablog.posts.show');
    }
}
