<?php

namespace App\Models;
use Cache;

class Banner extends Eloquent
{
    protected $fillable = [
        'title',
        'caption',
        'thumbnail',
        'link',
        'show',
        'alt',
        'area',
        'order',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function($banner){
            Cache::forget('Banner');
        });

    }

}
