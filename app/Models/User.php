<?php

namespace App\Models;

use App\ProductRate;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, LocalizedEloquentTrait;

	const ADMIN_ID = 1; // for more security set -50 , for example
	const CUSTOMER_ID = 2;
	const GUEST_ID = 3;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','thumbnail','address','phone','active','permissions','country','city'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected function setPasswordAttribute($password)
    {
        if(empty($password)) {
            unset($this->attributes['password']);
        } else {
            $this->attributes['password'] = bcrypt($password);
        }
    }


	public function customerGroups()
	{
		return $this->belongsToMany('App\Models\CustomerGroup');
	}

	public function isAdmin()
	{
		if($this->role_id == self::ADMIN_ID || $this->permissions == -5) {
			return true;
		}

		return false;
	}

	public function isCustomer()
	{
		if($this->role_id == self::CUSTOMER_ID) {
			return true;
		}

		return false;
	}


	public function orders()
	{
		return $this->hasMany(Order::class)->orderBy('id','desc');
	}


	public function rates()
	{
		return $this->belongsToMany(ProductRate::class, 'product_rate_product');
	}

	public function getFullName()
	{
		return $this->attributes['name'];
	}


	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
