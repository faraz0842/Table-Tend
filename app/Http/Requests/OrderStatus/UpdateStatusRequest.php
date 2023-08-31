<?php

namespace App\Http\Requests\OrderStatus;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStatusRequest extends FormRequest
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
        $rules = [
            'en.status' => 'required|string',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.status'] = 'nullable|string';
        }
        $rules['slug'] = ['required', Rule::unique('order_statuses')->ignore($this->status->id)];
        $rules['color'] = 'required';
        return $rules;
    }
}
