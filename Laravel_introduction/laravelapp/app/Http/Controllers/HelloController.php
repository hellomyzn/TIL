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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);

        if ($validator->fails()){
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました!']);
    }
}
