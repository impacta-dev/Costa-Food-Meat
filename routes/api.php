<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('{lang}')->group(function() {
    Route::get('products/{category_id?}/{section_id?}', 'API\ProductController@index');
    Route::get('product_categories', 'API\ProductCategoryController@index');
    Route::get('product_sections/{category_id?}', 'API\ProductSectionController@index');
    Route::get('product_renders', 'API\ProductRenderController@index');

    // Text editor
    Route::get('text_edit_link', 'API\TextEditLinkController@get');
    Route::resource('page', 'API\PageContentController');
});