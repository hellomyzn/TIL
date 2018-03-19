<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends RankingController
{
    public function index()
    {
        // productsテーブルから最新順に作品を20件取得する
        $products = array();
        return view('products.index')->with('products', $products);
    }

    public function show()
    {
        // productsテーブルから該当するidの作品情報を取得し$productの変数へ代入する処理を書いて下さい
        $products = array();
        return view('products.show')->with('product', $product);
    }

    public function search()
    {
        // 検索フォームのキーワードをあいまい検索して、productsテーブルから20件の作品情報を取得する
        $products = array();
        return view('products.search')->with('products', $products);
    }
}
