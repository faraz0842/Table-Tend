<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\RestaurantCuisine;
use Illuminate\Database\Seeder;

class RestaurantCuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get the list of cuisine IDs
        $cuisineIds = Cuisine::pluck('id')->toArray();

        // Get all restaurants
        $restaurants = Restaurant::all();

        // Loop through each restaurant
        foreach ($restaurants as $restaurant) {
            // Check if the restaurant already has cuisines associated with it
            $existingRestaurantCuisines = $restaurant->restaurantCuisines;

            if ($existingRestaurantCuisines->isEmpty()) {
                // If the restaurant has no cuisines, add 3 random cuisines to it
                for ($i = 1; $i <= 3; $i++) {
                    $randomCuisineId = $cuisineIds[array_rand($cuisineIds)];
                    RestaurantCuisine::updateOrCreate(
                        [
                            'cuisine_id' => $randomCuisineId,
                            'restaurant_id' => $restaurant->id,
                        ],
                        [
                            'cuisine_id' => $randomCuisineId,
                            'restaurant_id' => $restaurant->id,
                        ]
                    );
                }
            }
        }
    }
}
