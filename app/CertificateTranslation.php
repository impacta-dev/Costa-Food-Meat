<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CertificateTranslation extends Model
{
    protected $table = 'certificates_translations';

    protected static function boot() {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereLangId(app()->getLocale());
        });
    }

    /**
     * Relationships
     */

    public function certificate() {
        return $this->belongsTo('App\Certificate');
    }
}
