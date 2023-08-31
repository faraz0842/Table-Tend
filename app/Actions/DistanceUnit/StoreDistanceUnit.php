<?php

namespace App\Actions\DistanceUnit;

use App\Models\DistanceUnit;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreDistanceUnit
{
    public function execute(array $data)
    {
        DB::beginTransaction();

        try {
            $distanceUnit = DistanceUnit::create($data);

            // Commit the transaction
            DB::commit();

            return $distanceUnit;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
