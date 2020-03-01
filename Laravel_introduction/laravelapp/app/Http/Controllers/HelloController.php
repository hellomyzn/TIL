<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = DB::table('people')->get();
        return view('Hello.index', ['items' => $items]);
    }


    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['msg' => 'Success']);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request){
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name =:name, mail =:mail, age =:age where id = :id', $param);
        return redirect('hello');
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id =:id', $param);
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people') ->offset($page * 3)
        ->limit(3)
        ->get();

        return view('hello.show', ['items' => $items]);

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
