<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function show($id)
    {
        if($id == Auth::user()->id){
            $authUser = Auth::user();
            $authUser->load('posts.likes', 'posts.comments');
            return view('pages.user.me', compact('authUser'));
        } else{
            $user = User::where('id', $id)->first();
            $user->load('posts.likes', 'posts.comments');
            return view('pages.user.show',compact('user'));
        }
    }
}
