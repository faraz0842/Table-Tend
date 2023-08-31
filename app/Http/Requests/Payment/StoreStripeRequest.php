<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StoreStripeRequest extends FormRequest
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
        $this->has('enable_stripe') ? $enable_stripe = 'Active' : $enable_stripe = 'Inactive';
        $this->merge(['enable_stripe' => $enable_stripe]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'enable_stripe' => 'nullable',
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
        ];
    }
}
