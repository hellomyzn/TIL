<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



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


    public function create (){

        $categories = LaracastsCategory::All();
        return view('laracasts.posts.create', compact('categories'));
    }

    public function store (){

        $user = auth()->user();

        request()->validate([
            'title'                 => 'required|max:255',
            'slug'                  => ['required', Rule::unique('laracasts_posts', 'slug')],
            'excerpt'               => 'required|max:255',
            'body'                  => 'required|max:255',
            'laracasts_category_id' => ['required', Rule::exists('laracasts_categories', 'id')],
        ]);
        

        $post = LaracastsPost::create([
            'title'                 => request()->title,
            'slug'                  => request()->slug,
            'excerpt'               => request()->excerpt,
            'body'                  => request()->body,
            'laracasts_category_id' => request()->laracasts_category_id,
            'laracasts_user_id'     => $user->id,
        ]);
        logger("Success to create Post: Post id: {{ $post->id }}, User name: {{ $user->name }} ");

        return redirect()->route('laracasts.post.home');
    }
}
