<?php

namespace App\Actions\ExtraGroup;

use App\Models\ExtraGroup;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateExtraGroupAction
{
    /**
     * Update extraGroup along with media.
     *
     * @param array $data
     * @param ExtraGroup $extraGroup
     * @return \App\Models\ExtraGroup
     * @throws Exception
     */
    public function execute(array $data, ExtraGroup $extraGroup)
    {
        DB::beginTransaction();

        try {
            $extraGroup->update($data);

            // Commit the transaction
            DB::commit();

            return $extraGroup;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
