<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StorePaypalRequest extends FormRequest
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
        $this->has('enable_paypal') ? $enable_paypal = 'Active' : $enable_paypal = 'Inactive';
        $this->merge(['enable_paypal' => $enable_paypal]);

        $this->has('enable_paypal_live_mode') ? $enable_paypal_live_mode = 'Active' : $enable_paypal_live_mode = 'Inactive';
        $this->merge(['enable_paypal_live_mode' => $enable_paypal_live_mode]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'enable_paypal' => 'nullable',
            'enable_paypal_live_mode' => 'nullable',
            'paypal_username' => 'required',
            'paypal_password' => 'required',
            'paypal_secret' => 'required',
            'paypal_app_id' => 'required',
        ];
    }
}
