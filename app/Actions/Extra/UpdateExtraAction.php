<?php

namespace App\Actions\Extra;

use App\Models\Extra;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateExtraAction
{
    /**
     * Update Extra along with media.
     *
     * @param array $data
     * @param Extra $extra
     * @return \App\Models\Extra
     * @throws Exception
     */
    public function execute(array $data, Extra $extra)
    {
        DB::beginTransaction();

        try {
            $extra->update($data);

            if (array_key_exists('image', $data)) {
                $extra->media()->delete();
                $extra->addMedia($data['image'])->toMediaCollection('extra.images');
            }

            $extra->save();

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
