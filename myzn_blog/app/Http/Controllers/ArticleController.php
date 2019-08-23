<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Daily;
use app\Monthly;
use app\Weekly;

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
        $text = "this is TEXT";
        return view('article.weekly_index', [
            'text'    => $text,
        ]);
    }

    public function weekly_create()
    {
        return view('article.weekly_create');
    }



    public function monthly_index()
    {
        $text = "this is TEXT";
        return view('article.monthly_index', [
            'text'    => $text,
        ]);
    }

    public function monthly_create()
    {
        return view('article.monthly_create');
    }
}
