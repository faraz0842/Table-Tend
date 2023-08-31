<?php

namespace App\Http\Requests\Socialite;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialiteRequest extends FormRequest
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
        $this->has('facebook') ? $facebook = 'Active' : $facebook = 'Inactive';
        $this->merge(['facebook' => $facebook]);

        $this->has('google') ? $google = 'Active' : $google = 'Inactive';
        $this->merge(['google' => $google]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'facebook_application_secret' => 'required',
            'facebook_application_id' => 'nullable',
            'google_application_secret' => 'nullable',
            'google_application_id' => 'nullable',
            'facebook' => 'nullable',
            'google' => 'nullable',
        ];
    }
}
