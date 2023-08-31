<?php

namespace App\Actions\MassUnit;

use App\Models\MassUnit;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateUnit
{
    /**
     * Execute the action to update a MassUnit and return it.
     *
     * @param array $data The data to update the MassUnit with.
     * @param MassUnit $unit The MassUnit instance to update.
     *
     * @throws Exception If a problem occurred while updating the unit.
     * @return MassUnit The updated MassUnit instance.
     */
    public function execute(array $data, MassUnit $unit): MassUnit
    {
        DB::beginTransaction();

        try {
            $unit->update($data);
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
