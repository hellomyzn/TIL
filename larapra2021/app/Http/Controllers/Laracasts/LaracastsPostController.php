<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use Illuminate\Http\Request;


class LaracastsPostController extends Controller
{

    public function index() {
        logger('welcome to laracasts/posts page');

        $posts = LaracastsPost::latest()->filter(request(['search', 'category', 'user']))->get();
        return view('laracasts.posts.index', [
            'posts' => $posts, 
            ]
        );
    }

    
    public function show(LaracastsPost $post) {
        logger("welcome to laracasts/post/$post->id page");

        return view('laracasts.posts.show', ['post' => $post]);
    }

}
