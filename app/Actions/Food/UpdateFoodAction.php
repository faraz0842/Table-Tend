<?php

namespace App\Actions\Food;

use App\Models\Food;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateFoodAction
{
    /**
     * Update food along with media.
     *
     * @param array $data
     * @param Food $food
     * @return \App\Models\Food
     * @throws Exception
     */
    public function execute($data, Food $food)
    {
        DB::beginTransaction();

        try {
            $food->update($data);

            if (array_key_exists('image', $data)) {
                $food->media()->delete();
                $food->addMedia($data['image'])->toMediaCollection('food.images');
            }

            $food->save();

            // Commit the transaction
            DB::commit();

            return $food;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
