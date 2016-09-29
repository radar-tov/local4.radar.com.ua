<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class BuyRequest extends Request
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
            'checked' => 'required',
	        'payment' => 'required|exists:payment_methods,id',
	        'shipment' => 'required|exists:shipment_methods,id'
        ];
    }


	public function messages()
	{
		return [
			'checked.required' => 'Для совершения покупки, нужно быть согласным с условиями обслуживания',
			'payment.required' => 'Укажите способ оплаты',
			'payment.exists' => 'Указан неверный способ оплаты',
			'shipment.required' => 'Укажите способ доставки',
			'shipment.exists' => 'Указан неверный способ доставки'
		];
	}
}
