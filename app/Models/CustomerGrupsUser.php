<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerGrupsUser extends Model
{
    protected $table = 'customer_group_user';
    protected $fillable = [
        'customer_group_id',
        'user_id'
    ];
}
