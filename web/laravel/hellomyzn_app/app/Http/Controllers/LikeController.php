<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Auth;

class LikeController extends Controller
{
    public function store(Request $request){
        Like::create([
            'user_id'       =>  Auth::user()->id,
            'post_id'       =>  $request->input('post_id'),
        ]);

        return redirect('/');
    }

    public function destroy(Request $request){
        $like = Like::buildQueryByUserIdAndPostId(
            Auth::user()->id,
            $request->input('post_id')
        );
        $like->delete();
        return redirect('/');
    }
}
