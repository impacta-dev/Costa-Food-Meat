<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductRender extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereVisible(1)->orderBy('order', 'asc');
        });
    }

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
        return $this->hasOne('App\ProductRenderTranslation');
    }
}
