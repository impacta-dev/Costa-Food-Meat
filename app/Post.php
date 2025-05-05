<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder
                ->whereVisible(1)
                ->where('published_at', '<', now())
                ->orderBy('published_at', 'desc');
        });
    }

    /**
     * Attributes
     */

    public function getMainImageAttribute() {
        try {
            return '/img/posts/' . $this->images->first()->path;
        } catch (Exception $e) {
            return '/img/pages/news/default-post.jpg';
        }
    }

    /**
     * Relationships
     */

    public function images() {
        return $this->hasMany('App\PostImage');
    }

    public function category() {
        return $this->belongsTo('App\PostCategory', 'post_category_id', 'id');
    }
}
