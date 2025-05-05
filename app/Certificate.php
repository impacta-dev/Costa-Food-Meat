<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class Certificate extends CustomModel
{
    protected $fillable = ['product_section_id'];
    // protected $translatable = ['name'];
    protected $appends = ['name', 'pdf', 'image'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    /**
     * Accessors
     */

    public function getNameAttribute() {
        $t = $this->translation ? $this->translation['name'] : null;
        return $t ? $t : $this->attributes['name'];
    }

    public function getPdfAttribute() {
        $t = $this->translation ? $this->translation['pdf'] : null;
        return $t ? $t : $this->attributes['pdf'];
    }

    public function getImageAttribute() {
        $t = $this->translation ? $this->translation['image'] : null;
        return $t ? $t : $this->attributes['image'];
    }

    
    /**
     * Relationships
     */

    public function translation() {
        return $this->hasOne('App\CertificateTranslation');
    }
    
}
