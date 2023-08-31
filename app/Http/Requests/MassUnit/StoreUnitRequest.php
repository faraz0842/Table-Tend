<?php

namespace App\Http\Requests\MassUnit;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'en.full_form' => 'required',
            'en.short_form' => 'required',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.full_form'] = 'required|unique:mass_unit_translations,full_form|max:20';
            $rules[$locale . '.short_form'] = 'required|unique:mass_unit_translations,short_form|max:10';
        }
        $rules['slug'] = 'required|unique:mass_units,slug';
        return $rules;
    }
}
