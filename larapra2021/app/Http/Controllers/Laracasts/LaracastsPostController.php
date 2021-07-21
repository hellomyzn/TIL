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
        
        $posts = LaracastsPost::latest()->filter(request()->only('search', 'category'))->get();
        $categories = LaracastsCategory::all();
        logger('welcome to laracasts/posts page');
    
        // dd($posts);

        
        return view('laracasts.posts', ['posts' => $posts, 'categories' => $categories]);
    }

    
    public function show(LaracastsPost $post) {
        logger("welcome to laracasts/post/$post->id page");
        return view('laracasts.post', ['post' => $post]);
    }

}
