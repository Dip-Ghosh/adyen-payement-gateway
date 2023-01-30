<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'card_number' =>'required|max:16',
            'expire'      =>'required',
            'cvv'         =>'required',
            'currency'    =>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Please enter card number',
            'currency.required' => 'Select an option',
            'expire.required'   => 'Expire date should be given',
            'cvv.required'      => 'CVV  must be a given'
        ];
    }
}
