<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Lang extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    
    public static function boot() {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->whereActive(1);
        });
    }
}
