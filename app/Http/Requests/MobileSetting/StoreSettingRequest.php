<?php

namespace App\Http\Requests\MobileSetting;

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
        $this->has('show_version') ? $show_version = 'Active' : $show_version = 'Inactive';
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
            'google_maps_key' => 'nullable',
            'default_unit_of_distance' => 'nullable',
            'language' => 'nullable',
            'application_version' => 'nullable',
            'show_version' => 'nullable',
        ];
    }
}
