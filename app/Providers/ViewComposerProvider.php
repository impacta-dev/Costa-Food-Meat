<?php

namespace App\Providers;

use App\Lang;
use App\MenuItem;
use App\PageContent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages/*', function ($view) {
            $menu1_items = MenuItem::where('menu_id', 1)->with('page')->get();
            $langs = Lang::get();
            
            $view->with(compact('menu1_items', 'langs'));
        });
    }
}
