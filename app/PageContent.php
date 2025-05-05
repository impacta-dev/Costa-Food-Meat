<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['content'];

    
    /**
     * Accessors
     */

    public function getContentAttribute()
    {
        $t = $this->translation ? $this->translation['content'] : null;
        return $t ? $t : $this->attributes['content'];
    }

    /**
     * Relationships
     */

    public function translation() {
        return $this->hasOne('App\PageContentTranslation');
    }
}
