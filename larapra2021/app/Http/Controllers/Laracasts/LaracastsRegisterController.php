<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Http\Request;

class LaracastsRegisterController extends Controller
{
    public function create()
    {
        logger('access to laracasts/register/create page');
        return view('laracasts.register.create');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255|min:7'
        ]);

        
        
        $user = LaracastsUser::create($attributes);
        logger("Successed to register User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts');
    }
}
