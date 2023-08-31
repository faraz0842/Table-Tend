<?php

namespace App\Actions\Restaurant;

use App\Models\Restaurant;

class DeleteRestaurant
{
    /**
     * Execute the action to delete restaurant.
     *
     * @param Restaurant $restaurant
     * @return bool
     */
    public function execute(Restaurant $restaurant): bool
    {
        $restaurant->foods()->delete();
        // Delete all translations associated with the restaurant
        $restaurant->deleteTranslations();

        // Delete the restaurant instance from the database
        $isDeleted = $restaurant->delete();

        return $isDeleted;
    }
}
