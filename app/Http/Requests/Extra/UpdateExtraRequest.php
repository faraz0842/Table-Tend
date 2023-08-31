<?php

namespace App\Http\Requests\Extra;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExtraRequest extends FormRequest
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
            $rule[$code.'.description'] = 'nullable';
        }
        $rule['image'] = 'nullable|max:2048|mimes:jpeg,png,jpg';
        $rule['slug'] = ['required',Rule::unique('extras')->ignore($this->extra->id)];
        $rule['extra_group_id'] = 'required';
        $rule['food_id'] = 'required';
        $rule['price'] = 'required';

        return $rule;
    }
}
