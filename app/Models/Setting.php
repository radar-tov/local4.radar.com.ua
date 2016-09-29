<?php namespace App\Models;


class Setting extends Eloquent
{
	protected $fillable =
	[
		'feedback_email',
		'contact_email',
		'address',
		'currency',

		'header_phone1',
		'header_phone2',

		'footer_phone1',
		'footer_phone2',
		'footer_phone3',

		'instagram',
		'facebook',
		'twitter',
		'google',
		'vkontakte',
		'youtube',
		'map_code',
		'news',
		'agreement',
		'about',
		'reviews',
		'uslovia'

	];

	public $timestamps = false;

}
