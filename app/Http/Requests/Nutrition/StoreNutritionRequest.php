<?php

namespace App\Http\Requests\Nutrition;

use Illuminate\Foundation\Http\FormRequest;

class StoreNutritionRequest extends FormRequest
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
        foreach (config('languages') as $code => $language) {
            $rule[$code.'.name'] = 'required|unique:nutrition_translations,name';
        }
        $rule['slug'] = 'required|unique:nutrition,slug';
        $rule['food_id'] = 'required';
        $rule['quantity'] = 'required';

        return $rule;
    }
}
