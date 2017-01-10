<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileProduct extends Model
{
    protected $table = 'file_product';
    protected $fillable = ['file_id', 'product_id', 'show'];
    public $timestamps = false;
}
