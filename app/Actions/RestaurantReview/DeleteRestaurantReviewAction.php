<?php

namespace App\Actions\RestaurantReview;

use App\Models\RestaurantReview;

class DeleteRestaurantReviewAction
{
    /**
     * Delete RestaurantReview and its translations.
     *
     * @param RestaurantReview $restaurantReview
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(RestaurantReview $restaurantReview)
    {
        $isDelete = $restaurantReview->delete();

        return $isDelete;
    }
}
