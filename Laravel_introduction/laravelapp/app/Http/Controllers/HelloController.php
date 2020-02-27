<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;


class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('Hello.index', ['msg'=>'Fill up the form']);
    }


    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg' => 'Success']);
    }


    public function cookie(Request $request)
    {
        if ($request->hasCookie('msg'))
        {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = 'Nothing cookie';
        }

        return view('hello.cookie', ['msg'=> $msg]);
    }


    public function cookie_post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.cookie', ['msg'=> '「' . $msg . '」をクッキーに保存しました']));
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}
