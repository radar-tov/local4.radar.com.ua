<?php namespace App\Http\Requests\User;

use App\Http\Requests\Request;


class UpdateRequest extends Request {

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
			'name'=>'required',
			'phone'=>'required|unique:users,phone,'.$this->segment(3),
			'active'=>'required|integer',
			'role_id'=>'',
		];
	}
}