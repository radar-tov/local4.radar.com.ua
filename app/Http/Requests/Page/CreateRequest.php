<?php namespace App\Http\Requests\Page;

use App\Http\Requests\Request;


class CreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'=>'required|min:4',
			'slug'=>'required|unique:pages,slug',
			'meta_title'=>'',
			'meta_keywords'=>'',
			'meta_description'=>'',
		];
	}
}