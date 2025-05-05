<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    /**
     * Attributes
     */

    public function getNameAttribute() {
        $t = $this->translation ? $this->translation['name'] : null;
        return $t ? $t : $this->attributes['name'];
    }

    public function getSlugAttribute() {
        $t = $this->translation ? $this->translation['slug'] : null;
        return $t ? $t : $this->attributes['slug'];
    }

    /**
     * Relationships
     */

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function translation()
    {
        return $this->hasOne('App\PostCategoryTranslation');
    }

}
