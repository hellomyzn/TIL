<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;


class HelloController extends Controller
{
    //
    public function index(Request $request)
    {

        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',

        ]);

        if ($validator->fails()){
            $msg = "query";
        } else{
            $msg = "ID/Pass, fill up the form";
        }
        
        return view('Hello.index', ['msg'=>$msg]);
    }


    public function post(Request $request)
    {

        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',

        ];

        $messages = [
            'name.required' => 'Name',
            'mail.email' => 'Mail',
            'age.numeric' => 'age',
            'age.min' => 'more than 0',
            'age.max' => 'less than 200',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->sometimes('age', 'min:0', function($input){
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200', function($input){
            return !is_int($input->age);
        });


        if ($validator->fails()){
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }

        return view('hello.index', ['msg' => '正しく入力されました!']);
    }
}
