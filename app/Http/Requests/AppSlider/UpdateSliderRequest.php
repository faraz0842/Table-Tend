<?php

namespace App\Http\Requests\AppSlider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSliderRequest extends FormRequest
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
        $this->has('enabled') ? $enabled = '1' : $enabled = '0';
        $this->merge(['enabled' => $enabled]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'en.text' => 'required',
            'en.button' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.text'] = 'nullable|string';
            $rules[$locale . '.button'] = 'nullable|string';
        }

        $rules['slug'] = ['required', Rule::unique('app_sliders')->ignore($this->slider->id)];
        $rules['food_id '] = '';
        $rules['restaurant_id '] = '';
        $rules['order '] = '';
        $rules['text_position '] = 'nullable';
        $rules['text_color '] = 'nullable';
        $rules['button_color '] = 'nullable';
        $rules['background_color '] = 'nullable';
        $rules['indicator_color '] = 'nullable';
        $rules['image_fit '] = 'nullable';
        $rules['enabled '] = 'nullable';
        $rules['image'] = 'nullable';
        $rules['image_path'] = 'nullable';
        return $rules;
    }
}
