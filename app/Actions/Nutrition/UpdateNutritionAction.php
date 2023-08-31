<?php

namespace App\Actions\Nutrition;

use App\Models\Nutrition;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateNutritionAction
{
    /**
     * Update nutrition along with media.
     *
     * @param array $data
     * @param Nutrition $nutrition
     * @return \App\Models\Nutrition
     * @throws Exception
     */
    public function execute(array $data, Nutrition $nutrition)
    {
        DB::beginTransaction();

        try {
            $nutrition->update($data);

            // Commit the transaction
            DB::commit();

            return $nutrition;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
