<?php

namespace App\Models;

class Page extends  Eloquent
{
	protected $fillable = [
		'user_id',
		'show',
		'order',
		'title',
		'slug',
		'meta_title',
		'meta_keywords',
		'meta_description',
	];

	public function articles()
	{
		return $this->hasMany(Article::class);
	}

}
