<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodationField extends Model {

	protected $fillable = ["name","show",'is_filter'];

	public $timestamps = false;

	public function categories()
	{
		return $this->belongsToMany('App\Models\Category');
	}
}
