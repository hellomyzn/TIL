<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //Show all articles
    public function index_daily()
    {
        $picture = "this is PICTURE";
        $title = "this is TITLE";
        $text = "this is TEXT";
        return view('article.index_daily', [
            'picture' => $picture,
            'title'   => $title,
            'text'    => $text,
        ]);
    }

}
