<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    /**
     * Accessors
     */

    public function getContentAttribute() {
        $t = $this->translation ? $this->translation['content'] : null;
        return $t ? $t : $this->attributes['content'];
    }

    /**
     * Relationships
     */

    public function translation() {
        return $this->hasOne('App\TextTranslation');
    }
}
