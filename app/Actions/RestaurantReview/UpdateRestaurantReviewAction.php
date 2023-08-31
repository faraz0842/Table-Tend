<?php

namespace App\Actions\RestaurantReview;

use App\Models\RestaurantReview;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateRestaurantReviewAction
{
    /**
     * Update restaurantReview.
     *
     * @param array $data
     * @param RestaurantReview $restaurantReview
     * @return RestaurantReview
     * @throws Exception
     */
    public function execute(array $data, RestaurantReview $restaurantReview)
    {
        DB::beginTransaction();

        try {
            $restaurantReview->update($data);

            // Commit the transaction
            DB::commit();

            return $restaurantReview;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
