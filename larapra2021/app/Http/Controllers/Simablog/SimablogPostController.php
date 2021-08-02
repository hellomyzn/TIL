<?php

namespace App\Http\Controllers\Simablog;

use App\Models\Simablog\SimablogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimablogPostController extends Controller
{
    public function indesx()
    {
        $posts = SimablogPost::all();
        return view('simablog.posts.');
    }

}
