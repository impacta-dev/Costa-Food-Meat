<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PageContentTranslation extends Model
{
    protected $fillable = ['lang_id', 'page_content_id', 'content'];
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereLangId(app()->getLocale());
        });
    }
}
