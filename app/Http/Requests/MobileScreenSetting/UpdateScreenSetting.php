<?php

namespace App\Http\Requests\MobileScreenSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScreenSetting extends FormRequest
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
            'section_1' => 'nullable',
            'section_2' => 'nullable',
            'section_3' => 'nullable',
            'section_4' => 'nullable',
            'section_5' => 'nullable',
            'section_6' => 'nullable',
            'section_7' => 'nullable',
            'section_8' => 'nullable',
            'section_9' => 'nullable',
            'section_10' => 'nullable',
            'section_11' => 'nullable',
            'section_12' => 'nullable',
        ];
    }
}
