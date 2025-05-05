<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductSection extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereActive(1)->orderBy('order', 'asc');
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

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id', 'id');
    }

    public function translation()
    {
        return $this->hasOne('App\ProductSectionTranslation');
    }

}
