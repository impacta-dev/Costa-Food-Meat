<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        app()->setLocale($request->lang);

        $category_id = $request->category_id;
        $section_id = $request->section_id;
        $search_query = $request->search_query;

        $products = Product::with('translation', 'images')
            ->when(config('app.fallback_locale') !== $request->lang, function ($q) use ($request) {
                $q->whereHas('translation', function ($translation) use ($request) {
                    $translation->where('lang_id', $request->lang);
                });
            })
            ->when($section_id, function ($q) use ($section_id) {
                $q->where('product_section_id', $section_id);
            })
            ->when(!$section_id && $category_id, function ($q) use ($category_id) {
                $q->whereHas('section', function($q) use ($category_id) {
                    $q->whereProductCategoryId($category_id);
                });
            })
            ->when($search_query && trim($search_query !== ''), function ($q) use ($search_query, $request) {
                $q->where(function ($q) use ($search_query, $request) {
                    $q->where('products.ref', 'like', '%' . $search_query . '%')
                        ->orWhere(function ($q) use ($search_query, $request) {
                            // search in default lang
                            if (config('app.fallback_locale') === $request->lang) {
                                $q->where('products.name', 'like', '%' . $search_query . '%');
                            // search in other lang
                            } else {
                                $q->whereHas('translation', function($translation) use ($search_query) {
                                    $translation->where('product_translations.name', 'like', '%' . $search_query . '%');
                                });
                            }
                        });
                });
            })
            ->join('product_sections', 'product_sections.id', '=', 'products.product_section_id')
            ->orderBy('products.order', 'asc')
            ->orderBy('product_sections.product_category_id', 'asc')
            ->orderBy('product_section_id', 'asc')
            ->get('products.*');

        return response($products->toJson(), Response::HTTP_OK);
    }
}
