<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class Product extends CustomModel
{
    protected $fillable = ['product_section_id'];
    // protected $translatable = ['name'];
    protected $appends = ['name', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            if (config('app.fallback_locale') === app()->getLocale()) {
                $builder->whereVisible(1);
            }
        });
    }

    /**
     * Accessors
     */

    public function getNameAttribute() {
        $t = $this->translation ? $this->translation['name'] : null;
        return $t ? $t : $this->attributes['name'];
    }

    public function getSlugAttribute() {
        $t = $this->translation ? $this->translation['slug'] : null;
        return $t ? $t : $this->attributes['slug'];
    }

    public function getImageAttribute() {
        if ($this->images->count() > 0) {
            return $this->images->first()->path;
        }

        return 'default.png';
    }
    
    /**
     * Relationships
     */

    public function translation() {
        return $this->hasOne('App\ProductTranslation');
    }
    
    public function section() {
        return $this->belongsTo('App\ProductSection', 'product_section_id', 'id');
    }

    public function features() {
        return $this->belongsToMany('App\ProductFeature', 'products_product_features');
    }

    public function images() {
        return $this->hasMany('App\ProductImage');
    }
}
