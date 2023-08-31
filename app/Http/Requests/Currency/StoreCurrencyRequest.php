<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:currencies,name|min:2|max:50',
            'symbol' => 'required|unique:currencies,symbol|min:2|max:60',
            'code' => 'required|unique:currencies,code|min:2|max:5',
            'decimal_digits' => 'required',
            'rounding' => 'required',
        ];
    }
}
