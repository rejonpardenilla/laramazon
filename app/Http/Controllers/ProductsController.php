<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Seller;
use App\Tag;
use App\Review;

use Response;

class ProductsController extends Controller
{

    public static function index() 
    {

        $products = Product::all();
        $response = [];
        // products = [[],[],[],...];
        foreach ($products as $product) {
            $productData = [];
            $sellerId = $product->seller_id;
            $seller = Seller::find($sellerId);


            // TODO: Send here the tags too
            $productData = [
                'product' => $product, 
                'seller' => $seller,
            ];

            // Each element of productData contains the data of the product plus the seller of that product
            array_push($response, $productData);
        }


        return Response::json($response);
    }


    public function show(Product $product) 
    {
        $sellerId = $product->seller_id;
        $seller = Seller::find($sellerId);

        $productData = [
            'product' => $product,
            'seller' => $seller,
        ];

        return $productData;
    }


    public function store(Request $request) 
    {
        // $this->authorize('create', Product::class);
        $attributes = $request->all();
        $product = Product::create($attributes);
        return Response::json($product);
    }

    public function update(Request $request, Product $product) 
    {
        $attributes = $request->all();
        $product->update($attributes);
        return $product;
    }

    public function destroy(Product $product) 
    {
        $productId = $product->id;
        
        $reviews = Review::where(
            'product_id', '=', $productId)->get();

        foreach ($reviews as $review) {
            $review->delete();
        }

        $product->delete();
        return Response::json([], 200);
    }




    /*

    public function show(Product $product) 
    {
        $productInstance = Product::findOrFail($product);
        return $productInstance;
    }

    */


}
