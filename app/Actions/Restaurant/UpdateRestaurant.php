<?php

namespace App\Actions\Restaurant;

use App\Models\Restaurant;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateRestaurant
{
    /**
     * Updates a existing restaurant with given data.
     *
     * @param array $data
     * @param Restaurant $restaurant
     *
     * @return Restaurant
     * @throws Exception
     */
    public function execute(array $data, Restaurant $restaurant): Restaurant
    {
        DB::beginTransaction();

        try {
            $restaurant->update($data);
            $restaurant->cuisines()->sync($data['cuisines']);
            $restaurant->users()->sync($data['users']);

            if (array_key_exists('image', $data)) {
                $restaurant->media()->delete();
                $restaurant->addMedia($data['image'])->toMediaCollection('restaurant.images');
            }
            // Commit the transaction
            DB::commit();

            return $restaurant;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
