<?php namespace App\Http\Requests\Setting;

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
			'feedback_email'=>'required|email',
			'contact_email'=>'email',
			'address',
			'currency'=>'numeric',

			'header_phone1',
			'header_phone2',

			'footer_phone1',
			'footer_phone2',
			'footer_phone3',
		];
	}
}