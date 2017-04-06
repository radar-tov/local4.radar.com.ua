<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $fillable = ['token', 'page', 'ip'];
    protected $table = 'online';
}
