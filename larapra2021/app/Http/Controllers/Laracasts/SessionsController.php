<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        logger('Access to laracasts/login page');
        return view('laracasts.sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (! auth()->attempt($attributes)){
            
            // auth failed
            logger("Failure to input correct email: '" . $attributes['email'] . "'");
            throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified. ']);            
        }

        // attempt to authenticate and login the user
        // based on the provided credentials
        session()->regenerate();

        $user = auth()->user();
        logger("Success to login User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts')->with('success', 'Welcome Back');


    }

    public function destroy()
    {
        $user = auth()->user();

        // logout
        auth()->logout();
        logger("Success to logout User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts')->with('success', 'Goodbye');
    }
}
