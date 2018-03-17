<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Tweet;

class UsersController extends Controller
{

    public function show($id)
    {
      $name = Auth::user()->name;
      $tweets = User::find($id)->tweets()->orderBy('created_at', 'DESC')->paginate(5);
      
      return view('users.show')->with(array('name' => $name, 'tweets' => $tweets));
    }
}
