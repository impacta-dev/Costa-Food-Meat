<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ImprovementIdea extends Model
{
    protected $table = 'improvement_ideas';

    protected $guarded = ['id'];

    // protected static function boot() {
    //     parent::boot();

    //     static::addGlobalScope(function (Builder $builder) {
    //         $builder->whereLangId(app()->getLocale());
    //     });
    // }

    /**
     * Relationships
     */

    // public function improvement_idea() {
    //     return $this->belongsTo('App\ImprovementIdea');
    // }

    
}