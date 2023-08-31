<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Restaurant;
use App\Models\RestaurantReview;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get customer user ids from the User model based on their role
        $customerIds = User::role(RolesEnum::CUSTOMER->value)->pluck('id')->toArray();

        // Get all restaurant items
        $restaurants = Restaurant::all();

        // Loop through all restaurant items
        foreach ($restaurants as $key => $restaurant) {
            // Check if the index of the current restaurant item is even
            if ($key % 5 === 0 && $restaurant->reviews()->count() === 0) {
                // Generate a random number of restaurant reviews between 1 and 10
                for ($i = 0; $i < fake()->numberBetween(1, 10); $i++) {
                    // Get a random customer id from the customerIds array
                    $userId = $customerIds[array_rand($customerIds)];

                    // Create or retrieve a restaurant review with the provided user id and restaurant id
                    RestaurantReview::firstOrCreate($this->prepareData($userId, $restaurant->id));
                }
            }
        }
    }

    /**
     * Prepare data for restaurant review
     *
     * @param int $userId
     * @param int $restaurantId
     * @return array
     */
    public function prepareData(int $userId, int $restaurantId): array
    {
        /**
         * Create an array with the provided user id, restaurant id, a fake sentence
         * for the review, and a random rating between 1 and 5
         */
        return [
            'uuid' => Str::uuid(),
            'user_id' => $userId,
            'restaurant_id' => $restaurantId,
            'review' => fake()->sentence(10),
            'rate' => fake()->numberBetween(1, 5)
        ];
    }
}
