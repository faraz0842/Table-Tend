<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRazorpayRequest extends FormRequest
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
        $this->has('enable_razorpay') ? $enable_razorpay = 'Active' : $enable_razorpay = 'Inactive';
        $this->merge(['enable_razorpay' => $enable_razorpay]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'enable_razorpay' => 'nullable',
            'razorpay_key' => 'required',
            'razorpay_secret' => 'required',
        ];
    }
}
