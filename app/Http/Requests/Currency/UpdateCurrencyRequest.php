<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCurrencyRequest extends FormRequest
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
            'name' => ['required', Rule::unique('currencies', 'name')->ignore($this->currency), 'min:2', 'max:50'],
            'symbol' => ['required', Rule::unique('currencies', 'symbol')->ignore($this->currency), 'min:2', 'max:60'],
            'code' => ['required', Rule::unique('currencies', 'code')->ignore($this->currency), 'min:2', 'max:5'],
            'decimal_digits' => 'required',
            'rounding' => 'required',
        ];
    }
}
