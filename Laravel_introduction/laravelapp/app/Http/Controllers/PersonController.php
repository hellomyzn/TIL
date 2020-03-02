<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Person;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request){
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->
            ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    protected static function boot()
    {
        person::boot();

        static::addGlobalScope('age', function(Builder $builder){
            $builder->where('age', '>', 20);
        });
    }    
}
