<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\UserRestaurant;
use Illuminate\Database\Seeder;

class UserRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all user IDs with manager roles
        $managerIds = User::role(RolesEnum::MANAGER->value)->pluck('id')->toArray();

        // Get all restaurants
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            // Check if the restaurant already has associated managers
            $existingUserRestaurants = $restaurant->userRestaurants;

            // If the restaurant doesn't have any managers, create three random associations
            if ($existingUserRestaurants->isEmpty()) {
                for ($i = 1; $i <= 3; $i++) {
                    // Choose a random manager ID
                    $randomManagerId = $managerIds[array_rand($managerIds)];

                    // Create or update the UserRestaurant model
                    UserRestaurant::updateOrCreate(
                        [
                            'user_id' => $randomManagerId,
                            'restaurant_id' => $restaurant->id,
                        ],
                        [
                            'user_id' => $randomManagerId,
                            'restaurant_id' => $restaurant->id,
                        ]
                    );
                }
            }
        }
    }
}
