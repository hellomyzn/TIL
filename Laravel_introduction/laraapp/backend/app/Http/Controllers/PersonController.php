<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index',compact('items'));
    }

    public function find(Request $request){
        $input = '';
        return view('person.find', compact('input'));
    }

    public function search(Request $request){
        $item = Person::find($request->input);
        $input = $request->input;
        return view('person.find', compact('item', 'input'));
    }

    public function find_where(Request $request){
        $input = '';
        return view('person.find_where', compact('input'));
    }

    public function search_where(Request $request){
        $item = Person::where('name', $request->input)->first();
        $input = $request->input;
        return view('person.find', compact('item', 'input'));
    }
}
