<?php

namespace App\Actions\MassUnit;

use App\Models\MassUnit;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreUnit
{
    /**
     * Store a new MassUnit instance in the database.
     *
     * @param  array $data The data to create the MassUnit instance from.
     * @return MassUnit The newly created MassUnit instance.
     * @throws Exception If an exception occurs, it will be re-thrown.
     */
    public function execute(array $data): MassUnit
    {
        DB::beginTransaction();
        try {
            $unit = MassUnit::create($data);
            // Commit the transaction
            DB::commit();
            return $unit;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
