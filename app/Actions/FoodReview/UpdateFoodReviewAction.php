<?php

namespace App\Actions\FoodReview;

use App\Models\FoodReview;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateFoodReviewAction
{
    /**
     * Update foodReview along with media.
     *
     * @param array $data
     * @param FoodReview $foodReview
     * @return \App\Models\FoodReview
     * @throws Exception
     */
    public function execute(array $data, FoodReview $foodReview)
    {
        DB::beginTransaction();

        try {
            $foodReview->update($data);

            // Commit the transaction
            DB::commit();

            return $foodReview;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
