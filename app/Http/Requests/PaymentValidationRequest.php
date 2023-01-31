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
            'card_number' => 'required',
            'expire'      => 'required',
            'cvv'         => 'required',
            'currency'    => 'required',
            'amount'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'card_number.required'  => ' Please enter card number',
            'expire.required'       => ' Expire date should be given',
            'cvv.required'          => ' CVV  must be a given',
            'currency.required'     => ' Select an option',
            'amount.required'       => ' Amount must be greater than zero'
        ];
    }
}
