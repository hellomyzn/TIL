<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Person;

use App\MyClasses\MyServiceInterface;
use App\Facades\Myservice;


class HelloController extends Controller
{

    // # Section1
    // function __construct(){
    //     config(['sample.message' => 'This message is from hello controller construct through config/sample.php']);
    // }

    // public function index(){
    //     $data = [
    //         'msg' => 'This is sample message from hello Controller',
    //     ];

    //     return view('hello.index', compact('data'));
    // }

    // public function index_name(){
    //     return view('hello.index_name');
    // }

    // public function index_other(){
    //     return redirect()->route('HI');
    // }

    // public function index_id($id){
    //     return view('hello.index_id', compact('id'));
    // }

    // public function index_hello(Request $request){
    //     $hello = $request->hello;
    //     return view('hello.index_hello', compact('hello'));
    // }

    // public function index_bye(Request $request){
    //     $bye = $request->bye;
    //     return view('hello.index_bye', compact('bye'));
    // }

    // public function index_model(Person $person){
    //     return view('hello.index_model',compact('person'));
    // }

    // public function index_config(){
    //     $sample_msg = config('sample.message');
    //     $sample_data = config('sample.data');
    //     return view('hello.index_config', compact('sample_msg', 'sample_data'));
    // }

    // public function index_env(){
    //     $sample_msg = env('SAMPLE_MESSAGE');
    //     $sample_data = explode(',', env('SAMPLE_DATA'));
    //     return view('hello.index_env', compact('sample_msg', 'sample_data'));
    // }

    // public function index_storage(){
    //     $sample_msg = Storage::get('sample.txt');
    //     return view('hello.index_storage', compact('sample_msg'));
    // }

    // public function index_public(){
    //     $sample_msg = Storage::disk('public')->url('sample.txt');
    //     return view('hello.index_public', compact('sample_msg'));
    // }

    // public function index_storage_delete(){
    //     if (Storage::disk('public')->exists('bk_sample.txt'))
    //     {
    //         Storage::disk('public')->delete('bk_sample.txt');
    //     }
    //     Storage::disk('public')->copy('sample.txt','bk_sample.txt');

    //     if (Storage::disk('local')->exists('bk_sample.txt'))
    //     {
    //         Storage::disk('local')->delete('bk_sample.txt');
    //     }
    //     Storage::disk('local')->move('public/bk_sample.txt', 'bk_sample.txt');
    //     return redirect('hello');
    // }

    // public function index_download_page(){
    //     return view('hello.index_download');
    // }

    // public function index_download(){
    //     return Storage::disk('public')->download('sample.txt');
    // }

    // public function index_upload(){
    //     return view('hello.index_upload');
    // }
    // public function index_save(Request $request){
    //     Storage::disk('local')->putFile('files', $request->file('file'));
    //     return redirect('hello/index_upload');
    // }

    // public function index_save_as(Request $request){
    //     $ext = '.' . $request->file('file')->extension();
    //     Storage::disk('public')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
    //     return redirect('hello/index_upload');
    // }

    // public function index_allfiles(){
    //     $dir = '/';
    //     $all = Storage::disk('logs')->allfiles($dir);


    //     return view('hello/index_allfiles', compact('all'));
    // }

    // public function index_request(Request $request, Response $response){
    //     $msg = 'please input something';
    //     $keys = [];
    //     $values = [];
    //     if($request->isMethod('post'))
    //     {
    //         $msg = 'yout tyepd: '. $request->input('msg');
    //         // $form = $request->all();
    //         $form = $request->only(['msg', 'mail']);
    //         $keys = array_keys($form);
    //         $values = array_values($form);
    //     }


    //     return view('hello/index_request', compact('msg', 'keys', 'values'));
    // }

    // public function index_response(Request $request, Response $response){
    //     $msg = 'please input something';
    //     $keys = [];
    //     $values = [];
    //     if($request->isMethod('post'))
    //     {
    //         $msg = 'yout tyepd: '. $request->input('msg');
    //         $form = $request->all();
    //         $result ='<html><body>';
    //         foreach($form as $key => $value)
    //         {
    //             $result .= $key . ': ' . $value . '<br>';
    //         }
    //         $result .= '</body></html>';
    //         $response->setContent($result);
    //         return $response;
    //     }


    //     return view('hello/index_request', compact('msg', 'keys', 'values'));
    // }

    // public function index_old(Request $request, Response $response){
    //     $msg = 'please input something';
    //     $keys = [];
    //     $values = [];
    //     if($request->isMethod('post'))
    //     {
    //         $msg = 'yout tyepd: '. $request->input('msg');
    //         // $form = $request->all();
    //         $form = $request->only(['msg', 'mail', 'tel']);
    //         $keys = array_keys($form);
    //         $values = array_values($form);
    //         $msg = old('msg') . ', ' . old('mail') . ', ' . old('tel') . ', ';
    //     }

    //     $request->flash();
    //     return view('hello/index_old', compact('msg', 'keys', 'values'));
    // }

    // public function index_query(Request $request, Response $response)
    // {
    //     $name = $request->query('name');
    //     $mail = $request->query('mail');
    //     $tel = $request->query('tel');
    //     $msg = $name . ', '. $mail . ', '. $tel . ', ';

    //     $keys = ['Name', 'Mail', 'Tell'];
    //     $values = [$name, $mail, $tel];
    //     $request->flash();

    //     return view('hello.index_query', compact('msg', 'keys', 'values'));
    // }


    # Section 2

    // function __construct(int $id)
    // {
    //     $this->setId($id);
    //     $this->serial = rand();
    //     echo "[" . $this->serial . "]";

    // }

    public function index_service(MyService $myservice)
    {
        $msg = $myservice->say();
        $data = $myservice->data();
        return view('hello.index_service', compact('msg', 'data'));
    }

    public function index_app()
    {
        $myservice = app('App\Myclasses\Myservice');
        $msg = $myservice->say();
        $data = $myservice->data();
        return view('hello.index_service', compact('msg', 'data'));
    }

    public function index_service_paramater(int $id=-1){
        $myservice = app('App\Myclasses\Myservice', ['id' => $id]);
        $msg = $myservice->say($id);
        $data = $myservice->alldata();
        return view('hello.index_service', compact('msg', 'data'));
    }

    public function index_service_clojure(Myservice $myservice, int $id=-1){
        $myservice->setId($id);

        $msg = $myservice->say($id);
        $data = $myservice->alldata();
        return view('hello.index_service', compact('msg', 'data'));
    }

    public function index_singleton(MyService $myservice, int $id = -1){
        $myservice->setId($id);

        $msg = $myservice->say($id);
        $data = $myservice->alldata();
        return view('hello.index_singleton', compact('msg', 'data'));
    }

    public function index_interface(MyServiceInterface $myservice, int $id = -1)
    {
        $myservice->setId($id);

        $msg = $myservice->say($id);
        $data = $myservice->alldata();
        return view('hello.index_singleton', compact('msg', 'data'));
    }

    public function index_register_boot(MyServiceInterface $myservice, int $id = -1){
        $myservice->setId($id);
        $msg = $myservice->say($id);
        $data = $myservice->alldata();
        return view('hello.index_register_boot', compact('msg', 'data'));
    }

    public function index_facade(int $id = -1){
        MyService::setId($id);
        $msg = MyService::say($id);
        $data = MyService::alldata();
        return view('hello.index_facade', compact('msg', 'data'));
    }
}
