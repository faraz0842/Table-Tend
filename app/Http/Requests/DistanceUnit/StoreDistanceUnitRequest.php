<?php

namespace App\Http\Requests\DistanceUnit;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistanceUnitRequest extends FormRequest
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
            'en.name' => 'required|string|unique:distance_unit_translations,name',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'nullable|string|unique:distance_unit_translations,name';
        }
        $rules['slug'] = 'required|unique:distance_units,slug';
        return $rules;
    }
}
