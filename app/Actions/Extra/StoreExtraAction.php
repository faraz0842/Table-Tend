<?php

namespace App\Actions\Extra;

use App\Models\Extra;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreExtraAction
{
    /**
    * Store a newly created Extra in storage.
    *
    * @param  array  $data
    * @return Extra
    * @throws Exception
    */
    public function execute(array $data)
    {
        DB::beginTransaction();

        try {
            $extra = Extra::create($data);

            if (isset($data['image'])) {
                $extra->addMedia($data['image'])->toMediaCollection('extra.images');
            }

            // Commit the transaction
            DB::commit();

            return $extra;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
