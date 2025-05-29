<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Lang;

// Set default lang
$fallback_locale = Lang::where('_default', 1)->first()->id;
config(['app.fallback_locale' => $fallback_locale]);

// Set lang
if (!is_null(Request::segment(1)) || App::runningInConsole()) {
    $lang = Request::segment(1);
    app()->setLocale(Lang::find($lang) ? $lang : $fallback_locale);
} else {
    $browser_lang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : $fallback_locale;
    $lang = Lang::find($browser_lang) ? $browser_lang : $fallback_locale;
    header('Location: ' . config('app.url') . '/' . $lang);
    die();
}

// Edition mode
session_start();
$sess_hash = md5("mwUgrKkBB3xjTeuV".date("Y-m-d"));

Route::get('/edition-login', function() use ($sess_hash) {

    if (@$_SESSION['backend_sess'] == $sess_hash) {
        $_SESSION['edition_mode'] = $sess_hash;
    }

    return redirect('/');
});

Route::get('/edition-logout', function() {
    unset($_SESSION['edition_mode']);
    return redirect('/');
});

if ((@$_SESSION['edition_mode'] == $sess_hash ) && (@$_SESSION['backend_sess'] == $sess_hash)) {
    config(['costa-food.edition_mode' => true]);
} else {
    unset($_SESSION['edition_mode']);
}

// Routes
Route::group(['middleware' => 'under-construction'], function() {

    Route::get('/zh', function () {
        $filePath = public_path('/downloads/cfm_china.pdf');
    
        if (file_exists($filePath)) {
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="cfm_china.pdf"',
				'Cache-Control' => 'no-cache, must-revalidate',
            ]);
        } else {
            abort(404);
        }
    });

    Route::get('/catalogo', function () {
        $filePath = public_path('/downloads/catalogo_cfm.pdf');
    
        if (file_exists($filePath)) {
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="catalogo_cfm.pdf"',
				'Cache-Control' => 'no-cache, must-revalidate',
            ]);
        } else {
            abort(404);
        }
    });

    // Main routes
    Route::prefix(app()->getLocale())->group(function () {
        Route::view('/legal/{slug}', 'layouts.legal');
        Route::get('/{slug?}/{item?}', 'PageController@index');
        Route::post('contact', 'ContactController@send');
        Route::post('improvement-idea', 'ImprovementIdeaController@send');
        Route::post('product-contact', 'ProductContactController@send');
    });
    
    // Everything else 
    Route::fallback(function () {
        return redirect('/' . app()->getLocale());
    });
});