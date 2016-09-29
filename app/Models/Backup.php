<?php

namespace App\Models;

class Backup extends Eloquent
{
    protected $table = 'imports';

    protected $fillable = ['import','batch'];
}
