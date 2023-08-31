<?php

namespace App\Http\Requests\FoodReview;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodReviewRequest extends FormRequest
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
        $rule['user_id'] = 'required';
        $rule['food_id'] = 'required';
        $rule['review'] = 'required';
        $rule['rate'] = 'required';

        return $rule;
    }
}
