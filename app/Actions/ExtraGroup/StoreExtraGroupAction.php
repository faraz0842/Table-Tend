<?php

namespace App\Actions\ExtraGroup;

use App\Models\ExtraGroup;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreExtraGroupAction
{
    /**
    * Store a newly created ExtraGroup in storage.
    *
    * @param  array  $data
    * @return ExtraGroup
    * @throws Exception
    */
    public function execute(array $data)
    {
        DB::beginTransaction();

        try {
            $extra_group = ExtraGroup::create($data);

            // Commit the transaction
            DB::commit();

            return $extra_group;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
