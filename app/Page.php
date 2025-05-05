<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Accessors
     */

    public function getMetaTitleAttribute() {
        $t = $this->translation ? $this->translation['meta_title'] : null;
        return $t ? $t : $this->attributes['meta_title'];
    }

    public function getMetaDescriptionAttribute() {
        $t = $this->translation ? $this->translation['meta_description'] : null;
        return $t ? $t : $this->attributes['meta_description'];
    }

    public function getSlugAttribute() {
        $t = $this->translation ? $this->translation['slug'] : null;
        return $t ? $t : $this->attributes['slug'];
    }

    /**
     * Scopes
     */

    public function scopeHome($query) {
        return $query->where('is_home', 1);
    }

    /**
     * Relationships
     */

    public function contents() {
        return $this->hasMany('App\PageContent');
    }

    public function detail() {
        return $this->belongsTo('App\Page', 'page_detail', 'id');
    }

    public function translation() {
        return $this->hasOne('App\PageTranslation');
    }
}
