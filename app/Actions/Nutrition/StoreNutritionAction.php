<?php

namespace App\Actions\Nutrition;

use App\Models\Nutrition;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreNutritionAction
{
    /**
    * Store a newly created nutrition in storage.
    *
    * @param  array  $data
    * @return Nutrition
    * @throws Exception
    */
    public function execute(array $data)
    {
        DB::beginTransaction();
        try {
            $nutrition = Nutrition::create($data);

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
