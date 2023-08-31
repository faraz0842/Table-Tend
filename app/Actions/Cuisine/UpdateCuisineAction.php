<?php

namespace App\Actions\Cuisine;

use App\Models\Cuisine;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateCuisineAction
{
    /**
     * Update the specified cuisine in database.
     *
     * @param  array    $data
     * @param  Cuisine  $cuisine
     * @return Cuisine
     * @throws Exception
     */
    public function execute(array $data, Cuisine $cuisine): Cuisine
    {
        DB::beginTransaction();

        try {
            $cuisine->update($data);
            if (array_key_exists('image', $data)) {
                $cuisine->media()->delete();
                $cuisine->addMedia($data['image'])->toMediaCollection('cuisine.images');
            }
            // Commit the transaction
            DB::commit();
            return $cuisine;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
