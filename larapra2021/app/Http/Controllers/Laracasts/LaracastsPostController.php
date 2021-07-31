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
        $posts = LaracastsPost::latest()->filter(
                request(['search', 'category', 'user'])
                )->paginate(6)->withQueryString();
        
        return view('laracasts.posts.index', [
            'posts' => $posts, 
            ]
        );
    }

    
    public function show(LaracastsPost $post) {
        return view('laracasts.posts.show', ['post' => $post]);
    }

}
