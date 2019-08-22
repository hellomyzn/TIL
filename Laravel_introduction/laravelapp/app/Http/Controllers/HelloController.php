<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    //
    public function index($id='noname', $pass='unknown')
    {
        return <<<EOF
<html>
<body>
<h1>Index</h1>
<p>This is Hello Controller</p>
<ul>
    <li>ID : {$id}</li>
    <li>PASS : {$pass}</li>
</ul>
</body>
</html>
EOF;
    }


    public function index2(Request $request)
    {
        $data = [
            'msg' => 'This is Message from Hello Controller',
            'id' => $request->id,
        ];
        return view('hello.index2', $data);
    }

    public function index3()
    {
        $data = [
            'msg' => 'This is Message from Hello Controller with using blade',
        ];

        return view('hello.index3', $data);
    }

    public function form()
    {
        $data = [
            'msg' => 'This is Form page',
        ];

        return view('hello.form', $data);
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $data = [
            'msg'=>'hello'.$msg.'san!',
        ];
        return view('hello.index3', $data);
    }

    public function ifif(Request $request)
    {
        return view('hello.if', ['msg'=>$request->msg]);
    }

    public function isisset(Request $request)
    {
        return view('hello.isset', ['msg'=>$request->msg]);
    }

    public function forfor()
    {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.forfor', ['data'=>$data]);
    }


    public function forbreak()
    {
        return view('hello.forbreak');
    }

    public function loop()
    {

        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.loop', ['data'=>$data]);
    }

    public function pphhpp()
    {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.pphhpp', ['data'=>$data]);

    }

    public function section()
    {
        $data = [
            ['name' => "hoge", 'mail'=>'hoge@hoge'],
            ['name' => "fuge", 'mail'=>'fuge@fuge'],
            ['name' => "piyo", 'mail'=>'piyo@piyo'],
        ];
        return view('hello.section', ['data'=>$data]);
    }

    public function middle(Request $request)
    {
        return view('hello.middle', ['data'=>$request->data]);
    }

    public function response(Request $request)
        
    {
        return view('hello.response', ['data'=>$request->data]);
    }


    public function global(Request $request)
    {
        return view('hello.global', ['data'=>$request->data] );
    }

    public function groupe(Request $request)
    {
        return view('hello.groupe', ['data'=>$request->data]);
    }

    public function validate_hoge(Request $request)
    {
        return view('hello.validate', ['msg' => 'フォームを入力']);
    }

    public function validate_hoge_post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $this->validate($request, $validate_rule);
        return view('hello.validate',['msg' => '正しく入力されまいした']);
    }


    public function validate_request(HelloRequest $request)
    {
        return view('hello.validate', ['msg'=>'正しく入力されました']);
    }

    public function validator_hoge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);

        if ($validator->fails()){
            return redirect('/hello/validate_hoge')->withErrors($validator)->withInput();
        }

    }

    public function validator_costom(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => "Please enter your name",
            'mail.email' => "Please enter your email",
            'age.min' => "Please enter your age more than 0",
            'age.max' => "Please enter your age less than 199",
            'age.numeric' => 'Please enter numeric'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0', function($input){
            return !is_int($input->age);
        });

        $validator->sometimes('age', 'max:200', function($input){
            return !is_int($input->age);
        });

        if($validator->fails()){
            return redirect('/hello/validate_hoge')->withErrors($validator)->withInput();
        }

        return view('hello.validate', ['msg'=>'正しく入力されました']);
    }

    public function cookie_index(Request $request)
    {
        if($request->hasCookie('msg'))
        {
            $msg = 'Cookie: '. $request->cookie('msg');
        }else
        {
            $msg = "Nothing the cookie";
        }
        return view('hello.cookie', ['msg'=>$msg]);
    }

    public function cookie_post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.cookie', ['msg' => '['. $msg. '] saved cookie']));
        $response->cookie('msg', $msg, 100);
        return $response;
    }


    public function other(){
        return <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Other</h1>
    <p>This is other</p>
</body>
</html>
EOF;
    }


    public function request_and_response(Request $request, Response $response)
    {
        return <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Request and Response</h1>
    <h3>Request</h3>
    <pre>{$request}</pre>

    <h3>Response</h3>
    <pre>{$response}</pre>
</body>
</html>
EOF;
    }

    public function db_index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.db_index', ['items' => $items]);
    }


    public function db_index2(Request $request)
    {
        if(isset($request->id))
        {
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
             
        }else{
            $items = DB::select('select * from people');
        }
        return view('hello.db_index', ['items' => $items]);
    }


    public function db_post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.db_index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function db_create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello/db_index');
    }

    public function db_edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);

        return view('hello.edit', ['form' => $item[0]]);
    }

    public function db_update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,

        ];

        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello/db_index');
    }
}

