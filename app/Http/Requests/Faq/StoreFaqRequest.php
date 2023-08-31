<?php

namespace App\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            'en.question' => 'required|string',
            'en.answer' => 'required|string',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.question'] = 'nullable|string|unique:faq_translations,question';
            $rules[$locale . '.answer'] = 'nullable|string|unique:faq_translations,answer';
        }
        $rules['slug'] = 'required|unique:faqs,slug';
        $rules['faq_category_id'] = 'required';
        return $rules;
    }
}
