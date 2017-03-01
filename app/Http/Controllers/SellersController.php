<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Product;
use App\Address;

use Response;

class SellersController extends Controller
{

    public function index()
    {
        $sellers = Seller::all();
        return Response::json($sellers);
    }
    
    public function show(Seller $seller)
    {
        return $seller;
    }
    
    public function store(Request $request)
    {
        $attributes = $request->all();
        $seller = Seller::create($attributes);
        return Response::json($seller);
    }
    
    public function update(Request $request, Seller $seller)
    {
        $attributes = $request->all();
        $seller->update($attributes);
        return $seller;
    }
    
    public function destroy(Seller $seller)
    {
        $sellerId = $seller->id;

        // First get the products and address associate with that seller
        $products = Product::where(
            'seller_id', '=', $sellerId)->get();

        $addresses = Address::where(
            'seller_id', '=', $sellerId)->get();


        // Then delete them
        foreach ($products as $product) {
            $product->delete();
        }

        foreach ($addresses as $address) {
            $address->delete();
        }


        // Finally delete that seller
        $seller->delete();
        return Response::json([], 200);
    }


}
