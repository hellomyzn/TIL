<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;

class ReviewsController extends Controller
{
    //
    public function create($product_id)
    {
        $product = Product::find($product_id);
        return view('reviews.create')->with('product', $product);
    }

    public function store(Request $request, $product_id)
    {
        Review::create([
            'nickname' => $request->nickname,
            'rate' => $request->rate,
            'review' => $request->review,
            'product_id' => $product_id,
        ]);

        return redirect('/');
    }
}
