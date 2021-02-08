<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function show($id)
    {
        if($id == Auth::user()->id){
            return view('pages.user.me');
        } else{
            return view('pages.user.show',compact(id));
        }
    }
}
