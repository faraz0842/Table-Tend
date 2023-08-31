<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
        $this->has('active') ? $active = '1' : $active = '0';
        $this->merge(['active' => $active]);
        $this->has('availability_for_delivery') ? $availability_for_delivery = '1' : $availability_for_delivery = '0';
        $this->merge(['availability_for_delivery' => $availability_for_delivery]);
        $this->has('closed') ? $closed = '1' : $closed = '0';
        $this->merge(['closed' => $closed]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'en.name' => 'required',
            'en.description' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'nullable|string';
            $rules[$locale . '.description'] = 'nullable|string';
            $rules[$locale . '.address'] = 'nullable|string';
            $rules[$locale . '.information'] = 'nullable|string';
        }

        $rules['slug'] = 'required|unique:restaurants,slug';
        $rules['image'] = 'nullable|max:2048|mimes:jpeg,png,jpg';
        $rules['latitude'] = 'required';
        $rules['longitude'] = 'required';
        $rules['phone'] = 'required';
        $rules['mobile'] = 'nullable';
        $rules['admin_commission'] = 'nullable';
        $rules['delivery_fee'] = 'nullable';
        $rules['delivery_range'] = 'nullable';
        $rules['default_tax'] = 'nullable';
        $rules['closed'] = 'nullable';
        $rules['active'] = 'nullable';
        $rules['availability_for_delivery'] = 'nullable';
        $rules['users'] = 'required';
        $rules['cuisines'] = 'required';
        return $rules;
    }
}
