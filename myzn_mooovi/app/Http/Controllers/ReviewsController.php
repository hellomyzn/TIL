<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Review;

class ReviewsController extends RankingController
{
    public function create($id)
    {
        $product = Product::find($id);
        $review = new Review();
        return view('reviews.create')->with(array('product' => $product, 'review' => $review));
    }

    public function store(Request $request)
    {
        // Review::create()
        Review::create
        (
            [
                'nickname' => $request->nickname,
                'rate' => $request->rate,
                'review' => $request->review,
                'product_id' => $request->products,
            ]
        );
        return redirect('/');
    }
}
