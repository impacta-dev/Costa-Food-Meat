<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ProductSection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductSectionController extends Controller
{
    public function index(Request $request)
    {
        app()->setLocale($request->lang);

        $category_id = $request->category_id;

        $categories = ProductSection::whereHas('products', function ($q) use ($category_id) {
            return $q->when($category_id, function($q) use ($category_id) {
                return $q->where('product_category_id', $category_id);
            });
        })
        ->get();

        return response($categories->jsonSerialize(), Response::HTTP_OK);
    }
}
