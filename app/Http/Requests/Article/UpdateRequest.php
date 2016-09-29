<?php namespace App\Http\Requests\Article;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{

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
			'user_id'=>'',
			'page_id'=>'',
			'show'=>'',
			'order'=>'',

			'meta_title'=>'',
			'meta_keywords'=>'',
			'meta_description'=>'',

			'title'=>'required|min:4',
			'slug'=>'required|unique:articles,slug,'.$this->segment(3),
			'excerpt'=>'required',
			'content'=>'required',
			'thumbnail'=>'',
			'published_at'=>'',
		];
	}
}