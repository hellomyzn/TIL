<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Person;


class HelloController extends Controller
{

    # Section1
    function __construct(){
        config(['sample.message' => 'This message is from hello controller construct through config/sample.php']);
    }

    public function index(){
        $data = [
            'msg' => 'This is sample message from hello Controller',
        ];

        return view('hello.index', compact('data'));
    }

    public function index_name(){
        return view('hello.index_name');
    }

    public function index_other(){
        return redirect()->route('HI');
    }

    public function index_id($id){
        return view('hello.index_id', compact('id'));
    }

    public function index_hello(Request $request){
        $hello = $request->hello;
        return view('hello.index_hello', compact('hello'));
    }

    public function index_bye(Request $request){
        $bye = $request->bye;
        return view('hello.index_bye', compact('bye'));
    }

    public function index_model(Person $person){
        return view('hello.index_model',compact('person'));
    }

    public function index_config(){
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        return view('hello.index_config', compact('sample_msg', 'sample_data'));
    }

    public function index_env(){
        $sample_msg = env('SAMPLE_MESSAGE');
        $sample_data = explode(',', env('SAMPLE_DATA'));
        return view('hello.index_env', compact('sample_msg', 'sample_data'));
    }

    public function index_storage(){
        $sample_msg = Storage::get('sample.txt');
        return view('hello.index_storage', compact('sample_msg'));
    }
}
