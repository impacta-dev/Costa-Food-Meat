<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ProductRender;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductRenderController extends Controller
{
    public function index(Request $request)
    {
        app()->setLocale($request->lang);

        $renders = ProductRender::get();

        return response($renders->toJson(), Response::HTTP_OK);
    }
}
