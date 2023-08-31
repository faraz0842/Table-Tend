<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Food;
use App\Models\FoodReview;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodReviewsSeeder extends Seeder
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

        // Get all food items
        $foods = Food::all();

        // Loop through all food items
        foreach ($foods as $key => $food) {
            // Check if the index of the current food item is even
            if ($key % 5 === 0 && $food->reviews()->count() === 0) {
                // Generate a random number of food reviews between 1 and 10
                for ($i = 0; $i < fake()->numberBetween(1, 10); $i++) {
                    // Get a random customer id from the customerIds array
                    $userId = $customerIds[array_rand($customerIds)];

                    // Create or retrieve a food review with the provided user id and food id
                    FoodReview::firstOrCreate($this->prepareData($userId, $food->id));
                }
            }
        }
    }

    /**
     * Prepare data for food review
     *
     * @param int $userId
     * @param int $foodId
     * @return array
     */
    public function prepareData(int $userId, int $foodId): array
    {
        /**
         * Create an array with the provided user id, food id, a fake sentence
         * for the review, and a random rating between 1 and 5
         */
        return [
            'uuid' => Str::uuid(),
            'user_id' => $userId,
            'food_id' => $foodId,
            'review' => fake()->sentence(10),
            'rate' => fake()->numberBetween(1, 5)
        ];
    }
}
