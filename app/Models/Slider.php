<?php namespace App\Models;

class Slider extends Eloquent
{
        protected $table = "sliders";
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
