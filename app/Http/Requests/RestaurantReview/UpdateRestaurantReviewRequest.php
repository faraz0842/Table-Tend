<?php

namespace App\Http\Requests\RestaurantReview;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantReviewRequest extends FormRequest
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
        $rules['user_id'] = 'required';
        $rules['restaurant_id'] = 'required';
        $rules['review'] = 'required';
        $rules['rate'] = 'required';

        return $rules;
    }
}
