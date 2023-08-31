<?php

namespace App\Http\Requests\GlobalSetting;

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
        $this->has('fixed_header') ? $fixed_header = 'Active' : $fixed_header = 'Inactive';
        $this->merge(['fixed_header' => $fixed_header]);
        $this->has('fixed_footer') ? $fixed_footer = 'Yes' : $fixed_footer = 'No';
        $this->merge(['fixed_footer' => $fixed_footer]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'application_name' => 'nullable',
            'short_description' => 'nullable',
            'fixed_header' => 'nullable',
            'fixed_footer' => 'nullable',
            'image' => 'nullable',
            'application_logo' => 'nullable',
            'facebook_link' => 'nullable',
            'insta_link' => 'nullable',
            'google_link' => 'nullable',
            'twitter_link' => 'nullable',
            'email' => 'nullable',
        ];
    }
}
