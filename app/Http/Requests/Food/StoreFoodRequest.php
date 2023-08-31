<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
        $this->has('featured') ? $featured = '1' : $featured = '0';
        $this->merge(['featured' => $featured]);
        $this->has('deliverable') ? $deliverable = '1' : $deliverable = '0';
        $this->merge(['deliverable' => $deliverable]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        foreach (config('languages') as $code => $language) {
            $rule[$code.'.name'] = 'required|unique:food_translations,name';
            $rule[$code.'.description'] = 'nullable';
            $rule[$code.'.ingredients'] = 'nullable';
        }
        $rule['image'] = 'nullable|max:2048|mimes:jpeg,png,jpg';
        $rule['slug'] = 'required|unique:foods,slug';
        $rule['restaurant_id '] = 'nullable';
        $rule['category_id'] = 'required';
        $rule['price'] = 'required';
        $rule['discount_price'] = 'nullable';
        $rule['package_count'] = 'required';
        $rule['weight'] = 'required';
        $rule['unit_id '] = 'nullable';
        $rule['featured'] = 'nullable';
        $rule['deliverable'] = 'nullable';

        return $rule;
    }
}
