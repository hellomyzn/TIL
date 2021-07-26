<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy()
    {
        $user = auth()->user();

        # logout
        auth()->logout();
        logger("Success to logout User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts')->with('success', 'Goodbye');
    }
}
