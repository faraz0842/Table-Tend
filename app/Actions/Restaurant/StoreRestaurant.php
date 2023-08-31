<?php

namespace App\Actions\Restaurant;

use App\Models\Restaurant;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreRestaurant
{
    /**
     * Creates a new restaurant with given data.
     *
     * @param array $data The data to create the restaurant with.
     * @return Restaurant Returns the created Restaurant instance.
     * @throws Exception Throws an exception if an error occurs while creating the restaurant.
     */
    public function execute(array $data): Restaurant
    {
        DB::beginTransaction();

        try {
            $restaurant = Restaurant::create($data);
            $restaurant->cuisines()->sync($data['cuisines']);
            $restaurant->users()->sync($data['users']);

            if (isset($data['image'])) {
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
