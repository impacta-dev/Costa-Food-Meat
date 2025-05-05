<?php

use App\Page;
use App\PageContent;
use Illuminate\Support\Arr;

class CustomHelpers
{
  private static $instance;
  private $pages;

    private function __construct()
    {
        $this->main_contents = PageContent::whereNull('page_id')->with('translation')->get();
        $this->pages = Page::with('translation')->get();
    }

    public static function Instance()
    {
        if (!isset(self::$instance)) {
            $this_class = __CLASS__;
            self::$instance = new $this_class;
        }
        return self::$instance;
    }

    public function content($item, $page = null)
    {
        $contents = $page ? $page->contents : $this->main_contents;

        $content = Arr::first($contents, function ($value) use ($item) {
            return $value['slug'] == $item;
        });

        try {
            // Edition mode
            if (config('costa-food.edition_mode')) {
                $r = '<form class="js-textedit">';
                $r .=   '<input type="hidden" name="lang" value="' . app()->getLocale() . '">';
                $r .=   '<input type="hidden" name="id" value="' . $content->id . '">';
                $r .=   '<div class="js-textedit__content" contenteditable="true">' . $content['content'] . '</div>';
                $r .=   '<button type="submit"><img src="/img/icons/check.svg" alt="Guardar"></button>';
                $r .=   '<button class="js-textedit__link" data-content="' . $content->id . '" data-lang="' . app()->getLocale() . '"><img src="/img/icons/account-login.svg" alt="Editor externo"></button>';
                $r .= '</form>';

                return $r;
            }
            // Normal mode
            return $content['content'];
        } catch (Exception $e) {
            return '';
        }
    }

    function route_to_view($view, $id = null)
    {
        $page = $this->pages->where('view' ,$view)->first();
    
        if (!$page) {
            return '/';
        }

        if (app()->getLocale() == config('app.locale')) {
            $slug = $page->slug;
        } else {
            $translation = $page->translation;
        
            if (!$translation) {
                return '/';
            }

            $slug = $translation->slug;
        }
    
        $route = '/' . app()->getLocale() . '/' . $slug;
        $route .= (!is_null($id)) ? '/' . $id : '';
        
        return $route;
    }
}