<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageTranslation;
use App\Post;
use App\PostCategory;
use App\PostCategoryTranslation;
use App\Product;
use App\ProductRender;
use App\ProductTranslation;
use App\Certificate;
use CustomHelpers;

class PageController extends Controller
{
    public function index($slug = null, $item = null) {
        $data = [];

        if ($slug) {

            if (app()->getLocale() != config('app.fallback_locale')) {
                $page_trans = PageTranslation::whereSlug($slug)->whereLangId(app()->getLocale())->first();
                $page = $page_trans ? $page_trans->page : null;
            }

            if (!isset($page)) {
                $page = Page::whereSlug($slug)->first();
            }
            
        } else {
            $page = Page::home()->first();
        }

        if (!isset($page)) {
            return redirect('/');
        }

        $page->load('contents', 'contents.translation');

        /**
         * ACERCA DE LOS POSTS
         * 
         * Inicialmente el campo 'featured' se usaba simplemente para destacar visualmente unos artículos sobre otros.
         * Después se empezó a usar para marcar los que deben aparecer en la home.
         * 
         * Los posts en francés y en chino no se muestran en ningún listado, pero sí que pueden existir y ser enlazados desde otras webs.
         * Para las versiones en francés y en chino de la web se muestran las noticias que haya en inglés.
         * No se ha creado un campo específico para esto (ej. 'show_in_lists') para evitar modificar el backend (ya casi obsoleto).
         */

        switch($page->view) {
            case 'home':
                $posts_lang = in_array(app()->getLocale(), ['fr', 'zh']) ? 'en' : app()->getLocale();
                $data['latest_posts'] = Post::whereFeatured(1)
                    ->whereLangId($posts_lang)
                    ->take(3)
                    ->get();
                $data['renders'] = ProductRender::get();
                break;

            case 'products':
                // All products
                if (!$item) {
                    $data['renders'] = ProductRender::get();
                // Specific product
                } else {
                    $page->view = 'products-detail';
                    $data['product'] = Product::whereSlug($item)->first();
    
                    if (!$data['product']) {
                        $product_trans = ProductTranslation::whereSlug($item)->first();
    
                        if ($product_trans) {
                            $data['product'] = $product_trans->product;
                        }
                    }
    
                    if (!$data['product']) {
                        return redirect('/');
                    }
                }
                break;

            case 'certificates':
                $data['certificates'] = Certificate::get();
                $data['types'] = Certificate::all()->keyBy('type')->pluck('type')->toArray();
                break;
            
            case 'news':
                $posts_lang = in_array(app()->getLocale(), ['fr', 'zh']) ? 'en' : app()->getLocale();

                if ($item) {
                    // Posts by category
                    $data['current_category'] = PostCategory::whereSlug($item)->first();

                    if (!$data['current_category']) {
                        $category_trans = PostCategoryTranslation::whereSlug($item)->first();

                        if ($category_trans) {
                            $data['current_category'] = $category_trans->category;
                        }
                    }

                    // Specific post
                    if (!$data['current_category']) {
                        $page->view = 'news-detail';
                        $data['post'] = Post::whereSlug($item)->first();
        
                        if (!$data['post']) {
                            return redirect('/');
                        }
        
                        // Related posts
                        $n_related = 3;
                        $data['related_posts'] = Post::where('id', '!=', $data['post']->id)
                            ->whereLangId($posts_lang)
                            ->where('post_category_id', $data['post']->post_category_id)
                            ->take($n_related)
                            ->get();
        
                        if ($n_related > $data['related_posts']->count()) {
                            $new_related_posts = Post::where('id', '!=', $data['post']->id)
                                ->whereLangId($posts_lang)
                                ->whereNotIn('id', $data['related_posts']->pluck('id'))
                                ->inRandomOrder()
                                ->take($n_related - $data['related_posts']->count())
                                ->get();
        
                            $data['related_posts'] = $data['related_posts']->concat($new_related_posts);
                        }
                    }
                }

                // All posts
                if (isset($data['current_category']) || !$item) {
                    $category = $data['current_category'] ?? false;

                    $data['posts'] = Post::when($category, function($query) use ($category) {
                        $query->where('post_category_id', $category->id);
                    })
                    ->whereLangId($posts_lang)
                    ->with('category', 'images')->paginate(12);
                    
                    $data['categories'] = PostCategory::has('posts')->get();
                }

                break;
        }

        if (!is_null($page) && !is_null($page->view) && $page->view != '' && view()->exists('pages.' . $page->view)) {
            $data['utils'] = CustomHelpers::Instance();
            extract($data);
            return view('pages.' . $page->view, compact('page', array_keys($data)));
        } else {
            return redirect('/');
        }
    }
}
