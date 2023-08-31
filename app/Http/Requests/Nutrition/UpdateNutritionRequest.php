<?php

namespace App\Http\Requests\Nutrition;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNutritionRequest extends FormRequest
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
            $rule[$code.'.name'] = 'required';
        }
        $rule['slug'] = ['required',Rule::unique('nutrition')->ignore($this->nutrition->id)];
        $rule['quantity'] = 'required';
        $rule['food_id'] = 'required';

        return $rule;
    }
}
