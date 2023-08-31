<?php

namespace App\Http\Requests\SettingType;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingTypeRequest extends FormRequest
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
            'en.type' => 'required|unique:setting_type_translations,type',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.type'] = 'nullable|string|unique:setting_type_translations,type';
        }

        $rules['slug'] = 'required|unique:setting_types,slug';

        return $rules;
    }
}
