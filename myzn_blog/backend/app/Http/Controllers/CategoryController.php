<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // display a view of all of our categories
        // it will also have a form to create a new category
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }

    public function store(Request $request){

    }

}
