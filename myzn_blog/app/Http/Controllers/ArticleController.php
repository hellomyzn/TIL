<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\Monthly;
use App\Weekly;

use Storage;

class ArticleController extends Controller
{
    //Show all articles
    public function daily_index()
    {
        $picture = "this is PICTURE";
        $title = "this is TITLE";
        $text = "this is TEXT";
        return view('article.daily_index', [
            'picture' => $picture,
            'title'   => $title,
            'text'    => $text,
        ]);
    }


    public function daily_create()
    {
        return view('article.daily_create');
    }


    public function daily_store(Request $request){

        $path_hoge = request()->file('picture')->store('picture', 'public');

        $image = request()->file('picture');

        //第一引数はファイルの保存先のパス。「my_images/」配下に保存される
        //第二引数は画像ファイル
        //第三引数は外部からのアクセスの可否。publicにすると許可される
        $path = Storage::disk('s3')->putFile('images', $image, 'public');

        //アップロード先のファイルパスを取得
        $url = Storage::disk('s3')->url($path);


        Daily::create([

            'picture' => $path,
            'date'    => $request->date,
            'title'   => $request->title,
            'text'    => $request->text,
        ]);

        return redirect('/daily');
    }





    public function weekly_index()
    {
        $weeklies = Weekly::orderBy('created_at', 'DESC')->get();
        $text = "this is TEXT";
        return view('article.weekly_index', [
            'text'        => $text,
            'weeklies'    => $weeklies,
        ]);
    }


    public function weekly_create()
    {
        return view('article.weekly_create');
    }


    public function weekly_store(Request $request)
    {
        Weekly::create([
            'title' => $request->title,
            'text'  => $request->text,
        ]);
        return redirect('/weekly');
    }






    public function monthly_index()
    {
        $monthlies = Monthly::orderBy('created_at', 'DESC')->get();
        $text = "this is TEXT";
        return view('article.monthly_index', [
            'text'       => $text,
            'monthlies'  => $monthlies,
        ]);
    }


    public function monthly_create()
    {
        return view('article.monthly_create');
    }


    public function monthly_store(Request $request)
    {
        Monthly::create([
            'title' => $request->title,
            'text'  => $request->text,
        ]);
        return redirect('/monthly');
    }

}
