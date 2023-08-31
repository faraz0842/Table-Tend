<?php

namespace App\Http\Requests\OrderStatus;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatusRequest extends FormRequest
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
            $rules[$locale . '.status'] = 'nullable|string|unique:order_status_translations,status';
        }
        $rules['slug'] = 'required|unique:order_statuses,slug';
        $rules['color'] = 'required';
        return $rules;
    }
}
