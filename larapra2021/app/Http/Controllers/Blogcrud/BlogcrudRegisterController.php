<?php

namespace App\Http\Controllers\Blogcrud;

use App\Http\Controllers\Controller;
use App\Models\laracasts\BlogcrudUser;
use Illuminate\Http\Request;

class BlogcrudRegisterController extends Controller
{
    // public function create()
    // {
    //     return view('laracasts.register.create');
    // }

    // public function store()
    // {
    //     // validation
    //     $attributes = request()->validate([
    //         'name' => 'required|max:255',
    //         'username' => 'required|min:3|max:255|unique:laracasts_users,username',
    //         'email' => 'required|email|max:255|unique:laracasts_users,email',
    //         'password' => 'required|min:7|max:255',
    //     ]);

    //     // create user
    //     $user = LaracastsUser::create($attributes);
    //     logger("Success to register User id: {{ $user->id }} User name: {{ $user->name }} ");

    //     // Login
    //     auth()->login($user);
    //     logger("Success to login User id: {{ $user->id }} User name: {{ $user->name }} ");

    //     return redirect('/laracasts/posts')->with('success', 'Your account has been created.');
    // }
}
