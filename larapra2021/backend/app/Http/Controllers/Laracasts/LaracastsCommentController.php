<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsComment;
use Illuminate\Http\Request;

class LaracastsCommentController extends Controller
{
    public function store(LaracastsPost $post){

        $user = auth()->user();

        // Validation
        $attributes = request()->validate([
            'body' => 'required|min:3|max:255',
        ]);
        
        // Create
        $comment = LaracastsComment::create([
            'body' => request()->body,
            'laracasts_post_id' => $post->id,
            'laracasts_user_id' => $user->id
        ]);

        logger("Success to create Comment id: {{ $comment->id }} Post id: {{ $post->id}} User id: {{ $user->id}}");
        // Session
        return back()->with('success', 'Your comment has been created.');
    }
}
