<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('pages.post.create');
    }

    public function store(Request $request)
    {


        if($request->file('image')->isValid()){
            $description = $request->input('description');
            Post::create([
                'user_id'       =>  Auth::user()->id,
                'img_url'       =>  'https://images.unsplash.com/photo-1504214208698-ea1916a2195a?w=500&h=500&fit=crop',
                'description'    =>  $description,
            ]);
        }
        return redirect(route('index'));
    }
}
