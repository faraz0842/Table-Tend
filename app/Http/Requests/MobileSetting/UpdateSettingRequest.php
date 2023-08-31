<?php

namespace App\Http\Requests\MobileSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
        $this->has('show_version') ? $show_version = 'Yes' : $show_version = 'No';
        $this->merge(['show_version' => $show_version]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'google_Maps_Key' => 'required',
            'default_unit_of_distance' => 'required',
            'language_id' => 'required',
            'application_version' => 'required',
            'show_version' => 'nullable',
        ];
    }
}
