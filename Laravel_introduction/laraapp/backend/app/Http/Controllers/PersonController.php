<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\DB;

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
        return view('person.find_where', compact('item', 'input'));
    }

    public function find_scope(Request $request){
        $input = '';
        return view('person.find_scope', compact('input'));
    }

    public function search_scope(Request $request){
        $min = $request->input * 1;
        $max = $min + 10;

        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $input = $request->input;
        return view('person.find_scope', compact('item', 'input'));
    }

    public function find_name_scope(Request $request){
        $input = '';
        return view('person.find_name_scope', compact('input'));
    }

    public function search_name_scope(Request $request){
        $name = $request->input;
        $item = Person::NameEqual($name)->first();
        $input = $request->input;
        return view('person.find_name_scope', compact('item', 'input'));
    }

    public function find_grobal_scope(Request $request){
        $input = '';
        return view('person.find_grobal_scope', compact('input'));
    }

    public function search_grobal_scope(Request $request){
        $name = $request->input;
        $item = Person::NameEqual($name)->first();
        $input = $request->input;
        return view('person.find_grobal_scope', compact('item', 'input'));
    }

    public function add(){
        return view('person.add');
    }

    public function store(Request $request){
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('person/index');
    }

    public function edit(Request $request){
        $item = Person::find($request->id);
        return view('person.edit', compact('item'));
    }

    public function update(Request $request){
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->update();

        return redirect('person/index');
    }

    public function delete(Request $request){
        $item = Person::find($request->id);
        return view('person.delete', compact('item'));
    }

    public function remove(Request $request){

        Person::find($request->id)->delete();

        return redirect('person/index');
    }
}
