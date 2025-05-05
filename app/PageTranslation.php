<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PageTranslation extends Model
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

    public function page() {
        return $this->belongsTo('App\Page');
    }
}
