<?php

namespace App\Actions\SettingType;

use App\Models\SettingType;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreSettingTypeAction
{
    /**
     * Execute the query and return the first result.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function execute(array $data): mixed
    {
        DB::beginTransaction();

        try {
            $settingType = SettingType::create($data);

            // Commit the transaction
            DB::commit();

            return $settingType;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
