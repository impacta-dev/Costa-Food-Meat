<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    /**
     * Attributes
     */

    public function getNameAttribute() {
        $t = $this->translation ? $this->translation['name'] : null;
        return $t ? $t : $this->attributes['name'];
    }

    /**
     * Relationships
     */

    public function translation()
    {
        return $this->hasOne('App\ProductFeatureTranslation');
    }
}
