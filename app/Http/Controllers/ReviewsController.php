<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;

use Response;

class ReviewsController extends Controller
{

    public function store(Request $request)
    {
        // TODO: Restrict Request for using {product} as product_id
        $attributes = $request->all();
        $review = Review::create($attributes);
        return Response::json($review);
    }

    public function index(Product $product) 
    {
        $productId = $product->id;
        $reviews = Review::
            where('product_id', '=', $productId)->get();
        return Response::json($reviews);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return Response::json([], 200);
    }

}
