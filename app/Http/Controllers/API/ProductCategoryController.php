<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        app()->setLocale($request->lang);
        
        $categories = ProductCategory::has('products')->get();

        return response($categories->jsonSerialize(), Response::HTTP_OK);
    }
}
