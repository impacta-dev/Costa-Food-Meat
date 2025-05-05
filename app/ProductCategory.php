<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

class ProductCategory extends CustomModel
{
    // protected $translatable = ['name'];
    protected $appends = ['name'];

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

    public function translation()
    {
        return $this->hasOne('App\ProductCategoryTranslation');
    }

    public function sections()
    {
        return $this->hasMany('App\ProductSection');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\ProductSection');
    }
}
