<?php

namespace App\Http\Requests\AppTheme;

use Illuminate\Foundation\Http\FormRequest;

class StoreThemeRequest extends FormRequest
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
        return [
            'main_color_light' => 'nullable',
            'main_color_dark' => 'nullable',
            'second_color_light' => 'nullable',
            'second_color_dark' => 'nullable',
            'accent_color_light' => 'nullable',
            'accent_color_dark' => 'nullable',
            'background_color_light' => 'nullable',
            'background_color_dark' => 'nullable',
        ];
    }
}
