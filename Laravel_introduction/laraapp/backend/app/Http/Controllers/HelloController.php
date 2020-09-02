<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;

class HelloController extends Controller
{
    // # Section 2
    // public function index($id='no-id', $pass="no-pass"){
    //     return "{$id}, {$pass}";
    // }

    // public function index_req_and_res(Request $request, Response $response) {
    //     return "<h1>This is request</h1><br>
    //             {$request}<br><br>
    //             <h1>This is response</h1><br>
    //             {$response}";
    // }


    // # Section 3
    // public function index_php(){
    //     $data1 = [
    //         "msg" => "This is message from controller"
    //     ];

    //     $data2 = 123;
    //     return view("hello.index", compact('data2'))->with('data1',$data1);
    // }

    // public function index_php_refer($id="no-id"){
    //     return view("hello.refer_val", compact("id"));
    // }

    // public function index_query(Request $request){
    //     $msg = [
    //         "query" => $request->id
    //     ];
    //     return view("hello.query",compact("msg"));
    // }

    // public function index_blade(){
    //     $data = [
    //         "msg" => "This is message from controller throught the blade file"
    //     ];

    //     return view("hello.index_blade", compact("data"));
    // }

    // public function index_form(){
    //     return view("hello.index_form");
    // }

    // public function post(Request $request){
    //     $data = [
    //         "msg" => $request->msg
    //     ];
    //     return view("hello.post", compact("data"));
    // }

    // public function index_if(Request $request){
    //     $msg = $request->msg;
    //     return view("hello.index_if", compact("msg"));
    // }

    // public function index_unless(Request $request){
    //     $msg = $request->msg;
    //     return view("hello.index_unless", compact("msg"));
    // }

    // public function index_empty(Request $request){
    //     $msg = $request->msg;
    //     return view("hello.index_empty", compact("msg"));
    // }

    // public function index_isset(Request $request){
    //     $msg = $request->msg;
    //     return view("hello.index_isset", compact("msg"));
    // }

    // public function index_for(){
    //     return view('hello.index_for');
    // }

    // public function index_foreach(){
    //     $people = [
    //         "taro",
    //         "take",
    //         "mana",
    //         "yumi"
    //     ];
    //     return view('hello.index_foreach', compact("people"));
    // }

    // public function index_forelse(){
    //     $people = [
    //         "taro",
    //         "take",
    //         "mana",
    //         "yumi"
    //     ];

    //     $people = [];
    //     return view('hello.index_forelse', compact("people"));
    // }

    // public function index_while(){
    //     $number = 0;
    //     return view('hello.index_while', compact("number"));
    // }

    // public function index_break()
    // {
    //     return view("hello/index_break");
    // }

    // public function index_continue()
    // {
    //     return view("hello/index_continue");
    // }

    // public function index_loop()
    // {
    //     $people = [
    //         "taro",
    //         "take",
    //         "mana",
    //         "yumi"
    //     ];
    //     return view("hello/index_loop", compact("people"));
    // }

    // public function index_php_directive()
    // {
    //     return view('hello.index_php_directive');
    // }

    // # Section 4

    // public function index_yield(){
    //     $data = [
    //         ['name' => 'hoge', 'mail' => 'hoge@hoge.com'],
    //         ['name' => 'fuga', 'mail' => 'fuga@fuga.com'],
    //         ['name' => 'piyo', 'mail' => 'piyo@piyo.com']
    //     ];
    //     return view("hello.index_yield", compact('data'));
    // }

    // public function index_provider(){
    //     $data = [
    //         ['name' => 'hoge', 'mail' => 'hoge@hoge.com'],
    //         ['name' => 'fuga', 'mail' => 'fuga@fuga.com'],
    //         ['name' => 'piyo', 'mail' => 'piyo@piyo.com']
    //     ];

    //     $message = "This message is from controller";
    //     return view('hello.index_provider', compact(['data', 'message']));
    // }

    // public function index_composer(){
    //     $data = [
    //         ['name' => 'hoge', 'mail' => 'hoge@hoge.com'],
    //         ['name' => 'fuga', 'mail' => 'fuga@fuga.com'],
    //         ['name' => 'piyo', 'mail' => 'piyo@piyo.com']
    //     ];

    //     $message = "This message is from controller";
    //     return view('hello.index_composer', compact(['data', 'message']));
    // }

    // # Section 5
    // public function index_middleware(Request $request){
    //     $data = $request->data;
    //     return view('hello.index_middleware', compact('data'));
    // }

    // public function index_middleware_response(Request $request){
    //     return view('hello.index_middleware_response');
    // }

    // public function index_validate()
    // {
    //     $msg = 'Please fill up the form';
    //     return view('hello.index_validate',compact('msg'));
    // }

    // public function post_validate(Request $request)
    // {
    //     $validate_rule = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0, 150',
    //     ];

    //     $this->validate($request, $validate_rule);

    //     $msg = "You success to send a message";
    //     return view('hello.index_validate', compact('msg'));
    // }

    // public function index_request(){
    //     $msg = 'Please fill up the form. We are testing request functions';
    //     return view('hello.index_request', compact('msg'));
    // }

    // public function post_request(HelloRequest $request){

    //     $msg = "You success to send a message, This message was validated by request";
    //     return view('hello.index_request', compact('msg'));
    // }

    // public function index_validator(){
    //     $msg = "Please fill up the form. we are testing validator";
    //     return view('hello.index_validator',compact('msg'));
    // }

    // public function post_validator(HelloRequest $request){

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0, 150',
    //     ]);

    //     if ($validator->fails()){
    //         return redirect('/hello_validator')
    //                     ->wtihErrors($validator)
    //                     ->withInput();
    //     }
    //     $msg = "You success to send a message, This message was validated by validator";
    //     return view('hello.index_validator', compact('msg'));
    // }

    // public function index_query_validate(Request $request){

    //     $validator = Validator::make($request->query(), [
    //         'id' => 'required',
    //         'pass' => 'required',
    //     ]);

    //     if($validator->fails()){
    //         $msg = 'There is problme of query';
    //     } else {
    //         $msg = 'We got your ID/PASS. So please fill up the form';
    //     }

    //     return view('hello.index_query_validate', compact('msg'));
    // }

    // public function post_query_validate(Request $request){
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0, 150',
    //     ];

    //     $messages = [
    //         'name.required' => '名前を必ず入力してください。 by query validate',
    //         'mail.email' => 'メールアドレスが必要です by query validate',
    //         'age.numeric' => '年齢を整数で入力ください by query validate',
    //         'age.between' => '年齢は0-150の間で入力ください by query validate',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails())
    //     {
    //         return redirect('/hello/index_query_validate')
    //                         ->withErrors($validator)
    //                         ->withInput();
    //     }

    //     $msg = "You success to send a message, This message was validated by query validate";
    //     return view('hello.index_query_validate', compact('msg'));
    // }

    // public function index_sometimes(){
    //     $msg = "Please fill up the form. we are testing sometimes";
    //     return view('hello.index_sometimes', compact('msg'));
    // }

    // public function post_sometimes(Request $request){
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric',
    //     ];

    //     $messages = [
    //         'name.required' => '名前を必ず入力してください。 by sometimes',
    //         'mail.email' => 'メールアドレスが必要です by sometimes',
    //         'age.numeric' => '年齢を整数で入力ください by sometimes',
    //         'age.min' => '年齢は0才以上 by qsometimes',
    //         'age.max' => '年齢は150才以下 by qsometimes',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     $validator->sometimes('age', 'min:0', function($input){
    //         return !is_int($input->age);
    //     });

    //     $validator->sometimes('age', 'max:200', function($input){
    //         return !is_int($input->age);
    //     });

    //     if ($validator->fails()){
    //         return redirect('/hello/index_sometimes')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    //     return view('hello.index_sometimes', compact('msg'));

    // }


    // public function index_helloValidate(){
    //     $msg = "Please fill up the form. we are testing helloValidate";
    //     return view('hello.index_helloValidate', compact('msg'));
    // }

    // public function post_helloValidate(Request $request){
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|hello',
    //     ];

    //     $messages = [
    //         'name.required' => '名前を必ず入力してください。 by Hello Validate',
    //         'mail.email' => 'メールアドレスが必要です by Hello Validate',
    //         'age.numeric' => '年齢を整数で入力ください by Hello Validate',
    //         'age.hello' => 'Hello!　入力は偶数のみです。 by Hello Validate',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()){
    //         return redirect('/hello/index_helloValidate')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    //     return view('hello.index_helloValidate', compact('msg'));

    // }

    // public function index_validate_extend(){
    //     $msg = "Please fill up the form. we are testing validate extend";
    //     return view('hello.index_validate_extend', compact('msg'));
    // }

    // public function post_validate_extend(Request $request){
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|hello',
    //     ];

    //     $messages = [
    //         'name.required' => '名前を必ず入力してください。 by Hello Validate',
    //         'mail.email' => 'メールアドレスが必要です by Hello Validate',
    //         'age.numeric' => '年齢を整数で入力ください by Hello Validate',
    //         'age.hello' => 'Hello!　入力は偶数のみです。 by Hello Validate',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()){
    //         return redirect('/hello/index_validate_extend')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    //     return view('hello.index_validate_extend', compact('msg'));

    // }

    // public function index_csrt()
    // {
    //     $msg = 'Please fill up the form csrt';
    //     return view('hello.index_csrt',compact('msg'));
    // }

    // public function post_csrt(Request $request)
    // {
    //     $validate_rule = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0, 150',
    //     ];

    //     $this->validate($request, $validate_rule);

    //     $msg = "You success to send a message";
    //     return view('hello.index_csrt', compact('msg'));
    // }

    // public function index_cookie(Request $request){
    //     $msg = 'test for coockie';

    //     if ($request->hasCookie('msg')){
    //         $msg = 'Cookie: ' . $request->cookie('msg');
    //     } else {
    //         $msg = 'There is no cookie yet';
    //     }
    //     return view('hello.index_cookie', compact("msg"));
    // }

    // public function post_cookie(Request $request){
    //     $validate_rule = [
    //         'msg' => 'required',
    //     ];

    //     $this->validate($request, $validate_rule);
    //     $msg = $request->msg;
    //     $response = new Response(view('hello.index_cookie', ['msg' => '[' . $msg . ']: We got the cookie' ]));
    //     $response->cookie('msg', $msg, 100);
    //     return $response;
    // }

    // # Section 6
    // public function index_db(Request $request){
    //     $items = DB::select('select * from people');
    //     return view('hello.index_db', compact('items'));
    // }

    // public function index_db_combine(Request $request){
    //     if (isset($request->id))
    //     {
    //         $param = ['id' => $request->id];
    //         $items = DB::select('select * from people where id = :id', $param);

    //     } else {
    //         $items = DB::select('select * from people');
    //     }

    //     return view('hello.index_db_combine', compact('items'));
    // }

    // public function add(){
    //     return view('hello.add');
    // }

    // public function store(Request $request)
    // {
    //     $params = [
    //         'name' => $request->name,
    //         'mail' => $request->mail,
    //         'age' => $request->age,
    //     ];

    //     DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $params);

    //     return redirect('hello/index_db');
    // }

    // public function edit(Request $request)
    // {
    //     $item = DB::select('select * from people where id = :id', ['id' => $request->id]);
    //     return view('hello.edit', compact('item'));
    // }

    // public function update(Request $request)
    // {
    //     $param = [
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'mail' => $request->mail,
    //         'age' => $request->age,
    //     ];

    //     DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
    //     return redirect('hello/index_db');
    // }

    // public function del(Request $request) {
    //     $item = DB::select('select * from people where id = :id', ['id' => $request->id]);
    //     return view('hello.delete', compact('item'));
    // }

    // public function remove(Request $request)
    // {
    //     DB::delete('delete from people where id = :id', ['id' => $request->id]);
    //     return redirect('hello/index_db');
    // }

    // public function index_query_builder(Request $request){
    //     $items = DB::table('people')->get();
    //     return view('hello.index_query_builder', compact('items'));
    // }

    // public function show_query_builder(Request $request){

    //     $item = DB::table('people')->where('id', $request->id)->first();

    //     return view('hello.show_query_builder', compact('item'));
    // }

    // public function index_query_builder_where(Request $request){
    //     $items = DB::table('people')->where('id', "<=", $request->id)->get();

    //     return view('hello.index_query_builder_where', compact('items'));
    // }

    // public function index_query_builder_wherewhere(Request $request){
    //     $items = DB::table('people')
    //                     ->where('name', 'like', '%'. $request->name . '%')
    //                     ->where('mail', 'like', '%'. $request->mail . '%')
    //                     ->get();

    //     return view('hello.index_query_builder_wherewhere', compact('items'));
    // }

    // public function index_query_builder_whereorwhere(Request $request){
    //     $items = DB::table('people')
    //                     ->where('name', 'like', '%'. $request->name . '%')
    //                     ->orWhere('mail', 'like', '%'. $request->mail . '%')
    //                     ->get();

    //     return view('hello.index_query_builder_whereorwhere', compact('items'));
    // }

    // public function index_query_builder_whereRaw(Request $request){

    //     $min = $request->min;
    //     $max = $request->max;
    //     $items = DB::table('people')
    //                     ->whereRaw('age >= ? and age <= ?', [$min, $max])
    //                     ->get();

    //     return view('hello.index_query_builder_whereRaw', compact('items'));
    // }

    // public function index_query_builder_orderby(Request $request){

    //     $min = $request->min;
    //     $max = $request->max;
    //     $items = DB::table('people')
    //                     ->orderBy('age', 'asc')
    //                     ->get();

    //     return view('hello.index_query_builder_orderby', compact('items'));
    // }

    // public function index_query_builder_offsetLimit(Request $request){

    //     $page = $request->page;
    //     $items = DB::table('people')
    //                     ->offset($page * 3)
    //                     ->limit(2)
    //                     ->get();

    //     return view('hello.index_query_builder_offsetLimit', compact('items'));
    // }

    // public function add_insert(Request $request){
    //     return view('hello.add_insert');
    // }

    // public function create_insert(Request $request){

    //     $param = [
    //         'name' => $request->name,
    //         'mail' => $request->mail,
    //         'age' => $request->age,
    //     ];

    //     DB::table('people')->insert($param);
    //     return redirect('/hello/index_db');
    // }

    // public function edit_query_builder(Request $request){
    //     $item = DB::table('people')
    //                     ->where('id', $request->id)
    //                     ->first();

    //     return view('hello.edit_query_builder', compact('item'));
    // }

    // public function update_query_builder(Request $request){

    //     $param = [
    //         'name' => $request->name,
    //         'mail' => $request->mail,
    //         'age' => $request->age,
    //     ];

    //     DB::table('people')
    //             ->where('id', $request->id)
    //             ->update($param);
    //     return redirect('/hello/index_db');
    // }

    // public function remove_query_builder(Request $request){
    //     $item = DB::table('people')
    //                     ->where('id', $request->id)
    //                     ->first();

    //     return view('hello.remove_query_builder', compact('item'));
    // }

    // public function del_query_builder(Request $request){

    //     DB::table('people')
    //             ->where('id', $request->id)
    //             ->delete();
    //     return redirect('/hello/index_db');
    // }


    # Section7

    public function index_session(Request $request){
        $session_data = $request->session()->get('msg');
        return view('hello.index_session', compact('session_data'));
    }

    public function put_session(Request $request){
        $msg = $request->input;
        $request->session()->put('msg', $msg);

        return redirect('hello/index_session');
    }

    public function index_pagenation(Request $request){
        // $items= DB::table('people')->orderBy('age', 'asc')->simplePaginate(5);
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        return view('hello.index_pagenation', compact('items', 'sort'));
    }



}
