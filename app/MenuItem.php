<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MenuItem extends Model
{
    protected static function boot() {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('_order', 'asc');
        });
    }

    /**
     * Attributes
     */
    
    public function getLinkAttribute ($value) {
        if ($this->url) {
            return $this->url;
        }
        
        return '/' . app()->getLocale() . '/' . $this->page->slug;
    }

    public function getTitleAttribute() {
        $t = $this->translation ? $this->translation['title'] : null;
        return $t ? $t : $this->attributes['title'];
    }
    
    /**
     * Relationships
     */

    public function page ()
    {
        return $this->belongsTo('App\Page');
    }

    public function translation() {
        return $this->hasOne('App\MenuItemTranslation');
    }

}