<?php

namespace App\Http\Controllers\Blogcrud;

use App\Http\Controllers\Controller;
use App\Models\laracasts\BlogcrudUser;
use Illuminate\Http\Request;

class BlogcrudLoginController extends Controller
{
    public function create()
    {
        return view('blogcrud.auth.login');
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:laracasts_users,email',
            'password' => 'required|min:7|max:255',
        ]);

        // create user
        $user = LaracastsUser::create($attributes);
        logger("Success to register User id: {{ $user->id }} User name: {{ $user->name }} ");

        // Login
        auth()->login($user);
        logger("Success to login User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('blogcrud.posts')->with('success', 'Your account has been created.');
    }
}
