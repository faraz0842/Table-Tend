<?php

namespace App\Http\Requests\GlobalSetting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
        $this->has('fixed_footer') ? $fixed_footer = 'Active' : $fixed_footer = 'Inactive';
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
            'application_name' => 'required|min:2|max:30',
            'short_description' => 'required|min:2|max:80',
            'fixed_header' => 'required',
            'fixed_footer' => 'required',
            'image' => 'required',
            'application_logo' => 'required',
            'facebook_link' => 'required',
            'insta_link' => 'required',
            'google_link' => 'required',
            'twitter_link' => 'required',
            'email' => 'required',
        ];
    }
}
