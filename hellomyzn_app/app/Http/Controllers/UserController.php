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
            return view('pages.user.me');
        } else{
            $user = User::where('id', $id)->first();
            return view('pages.user.show',compact('user'));
        }
    }
}
