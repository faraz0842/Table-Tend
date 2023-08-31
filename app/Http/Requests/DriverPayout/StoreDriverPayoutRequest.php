<?php

namespace App\Http\Requests\DriverPayout;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverPayoutRequest extends FormRequest
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
            'user_id' => 'required',
            'payment_method_id' => 'required',
            'paid_date' => 'nullable',
            'note' => 'required',
            'amount' => 'required',
        ];
    }
}
