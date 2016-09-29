<?php

namespace App\Models;

class Article extends Eloquent
{
	protected $fillable = [
		'user_id',
		'page_id',
		'show',

		'meta_title',
		'meta_description',
		'meta_keywords',

		'title',
		'slug',
		'thumbnail',
		'excerpt',
		'content',
		'published_at',
	];

	protected $dates = ['created_at', 'updated_at', 'published_at'];

	public function page()
	{
		return $this->belongsTo(Page::class);
	}

}
