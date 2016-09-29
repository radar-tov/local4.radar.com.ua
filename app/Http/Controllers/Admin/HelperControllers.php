<?php

namespace App\Http\Controllers\Admin;


class HelperControllers extends  AdminController
{
	public function translate()
	{
		return config('translate.ru');
	}
}
