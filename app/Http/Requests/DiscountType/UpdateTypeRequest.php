<?php

namespace App\Http\Requests\DiscountType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
            'en.name' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'nullable|string|unique:discount_type_translations,name';
        }

        $rules['slug'] = ['required', Rule::unique('discount_types')->ignore($this->discount->id)];
        $rules['color'] = 'required';

        return $rules;
    }
}
