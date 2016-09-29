<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    protected $fillable = ['name','email','phone','city'];

}
