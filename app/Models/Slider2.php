<?php namespace App\Models;

class Slider2 extends Eloquent
{       
        protected $table  = "slider2";
	protected $fillable = [
		'title',
		'subtitle',
		'caption',
		'thumbnail',
		'link',
		'show',
		'alt',
		'order'
	];

}