<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PostCategoryTranslation extends Model
{
    protected static function boot() {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereLangId(app()->getLocale());
        });
    }

    /**
     * Relationships
     */

    public function category() {
        return $this->belongsTo('App\PostCategory', 'post_category_id', 'id');
    }
}
