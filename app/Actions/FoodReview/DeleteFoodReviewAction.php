<?php

namespace App\Actions\FoodReview;

use App\Models\FoodReview;

class DeleteFoodReviewAction
{
    /**
     * Delete foodReview and its translations.
     *
     * @param FoodReview $foodReview
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(FoodReview $foodReview)
    {
        $isDelete = $foodReview->delete();

        return $isDelete;
    }
}
