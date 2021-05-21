<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductsController extends Controller
{
    public function listProducts(Request $request){
        $products = (new Product)->getProductsWithPagination(0);

        // dd($products);

        return response()->json([
            "products" => $products
        ], 200);
    }
}
