<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
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
            'name' => 'required|max:255',
	        'phone' => 'required|max:20',
	        'email' => 'required|email|max:255|unique:users',
	        'password' => 'required|confirmed|min:6',
        ];
    }


	public function messages()
	{
		return [
			'name.required' => 'Поле ФИО обязательно для заполнения',
			'phone.required' => 'Поле Телефон обязетельно для заполнения',
			'phone.max' => 'Телефон не должен превышать 20 символов',
			'email.required' => 'Поле E-mail обязательно для заполнения',
			'email.email' => 'Указан неверный формат email адреса',
			'email.max' => 'E-mail не должен превышать 255 символов',
			'email.unique' => 'Пользователь с таким email уже существует',
			'password.required' => 'Поле Пароль обязательно для заполнения',
			'password.min' => 'Пароль не должен быть меньше 6 символов'
		];
	}
}
