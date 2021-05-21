<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function listCategories(Request $request){
        $categories = (new Category)->getCategoriesWithPagination(0);

        return response()->json([
            "categories" => $categories
        ], 200);
    }
}
