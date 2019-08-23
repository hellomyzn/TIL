<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\Monthly;
use App\Weekly;

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








    public function weekly_index()
    {
        $weeklies = Weekly::all();
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
        $text = "this is TEXT";
        return view('article.monthly_index', [
            'title' => $request->title,
            'text'  => $request->text,
        ]);
    }

    public function monthly_create()
    {
        return view('article.monthly_create');
    }
}
