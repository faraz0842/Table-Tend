<?php

namespace App\Http\Requests\FaqCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqCategoryRequest extends FormRequest
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
            'en.name' => 'required|string',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'nullable|string|unique:faq_category_translations,name';
        }
        $rules['slug'] = 'required|unique:faq_categories,slug';
        return $rules;
    }
}
