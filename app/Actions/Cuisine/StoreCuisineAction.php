<?php

namespace App\Actions\Cuisine;

use App\Models\Cuisine;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreCuisineAction
{
    /**
     * Create a new cuisine with the given data and image.
     *
     * @param array $data
     * @return Cuisine
     * @throws Exception
     */
    public function execute(array $data): Cuisine
    {
        DB::beginTransaction();

        try {
            $cuisine = Cuisine::create($data);

            if (isset($data['image'])) {
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
