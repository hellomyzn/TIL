<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(20);
        return view('products.index')->with('products', $products);
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return view('products.show')->with('product', $product);
    }
}
