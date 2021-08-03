<?php

namespace App\Http\Controllers\Blogcrud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogcrudPagesController extends Controller
{
    public function index(){
        return view('blogcrud/pages/index');
    }
}
