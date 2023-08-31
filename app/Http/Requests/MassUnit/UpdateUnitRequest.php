<?php

namespace App\Http\Requests\MassUnit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
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
            $rules[$locale . '.full_form'] = 'required';
            $rules[$locale . '.short_form'] = 'required';
        }
        $rules['slug'] = ['required', Rule::unique('mass_units')->ignore($this->unit->id)];
        return $rules;
    }
}
