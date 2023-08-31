<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->has('currency_place') ? $currency_place = 'Active' : $currency_place = 'Inactive';
        $this->merge(['currency_place' => $currency_place]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'default_tax' => 'required|integer',
            'default_currency' => 'required',
            'currency_place' => 'required',
        ];
    }
}
