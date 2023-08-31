<?php

namespace App\Http\Requests\Cuisines;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCuisinesRequest extends FormRequest
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
            'en.description' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'nullable|string';
            $rules[$locale . '.description'] = 'nullable|string';
        }

        $rules['slug'] = ['required', Rule::unique('cuisines')->ignore($this->cuisine->id)];
        $rules['image'] = 'nullable|max:2048|mimes:jpeg,png,jpg';

        return $rules;
    }
}
