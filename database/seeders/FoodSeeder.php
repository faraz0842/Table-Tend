<?php

namespace Database\Seeders;

use App\Helpers\FactoryHelper;
use App\Helpers\TranslateTextHelper;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodTranslation;
use App\Models\MassUnit;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds to create additional food items for restaurants
     * @return void
     */
    public function run(): void
    {
        // Get all category IDs
        $categoryIds = Category::pluck('id')->toArray();

        // Get all restaurant IDs
        $restaurantIds = Restaurant::pluck('id')->toArray();

        // Get all mass unit IDs
        $massUnitIds = MassUnit::pluck('id')->toArray();

        // Loop through each restaurant and create new food items to reach a specific limit
        foreach ($restaurantIds as $restaurantId) {
            /**
             * Calculate the difference between the current number of food items
             * and the desired number of food items
             */
            $specificRestaurantFoodCount = Food::whereRestaurantId($restaurantId)->count();
            $count = abs($specificRestaurantFoodCount - config('seederlimit.food_seeder_limit'));

            // Create new food items to reach the desired number of food items
            for ($i = 1; $i <= $count; $i++) {
                // Select a random category ID
                $randomCategoryId = $categoryIds[array_rand($categoryIds)];

                // Select a random massUnit ID
                $randomMassUnitId = $massUnitIds[array_rand($massUnitIds)];

                // Prepare the data for the new food item
                $foodData = $this->prepareData($restaurantId, $randomCategoryId, $randomMassUnitId);

                // Create or retrieve the new food item
                $food = Food::firstOrCreate(Arr::except($foodData, ['locales']));

                // Create or update the locales for the new food item
                $this->createOrUpdateFoodLocales($food, $foodData['locales']);
            }
        }
    }

    /**
     * Create or update the locales for a given food item.
     * @param Food $food The food item for which to create or update the locales.
     * @param array $locales An array of locales and their associated data (e.g. name, description, ingredients).
     * @return void
     */
    public function createOrUpdateFoodLocales(Food $food, array $locales): void
    {
        // Extract the locale data for the 'en' and 'ar' locales
        $enLocale = collect($locales)->firstWhere('locale', 'en');
        $arLocale = collect($locales)->firstWhere('locale', 'ar');

        // Remove the 'locale' key from the locale data
        $enLocale = Arr::except($enLocale, ['locale']);
        $arLocale = Arr::except($arLocale, ['locale']);

        // Create or update the 'en' locale for the food item
        FoodTranslation::firstOrCreate(
            ['food_id' => $food->id, 'locale' => 'en'],
            $enLocale
        );

        // Create or update the 'ar' locale for the food item
        FoodTranslation::firstOrCreate(
            ['food_id' => $food->id, 'locale' => 'ar'],
            $arLocale
        );
    }


    /**
     * Prepare data for Restaurant Seeder.
     * @param int $restaurantId The ID of the restaurant to which the dish belongs.
     * @param int $categoryId The ID of the category to which the dish belongs.
     * @param int $massUnitIds The ID of the mass unit used to measure the dish's weight.
     * @return array An array containing the dish's information in both English and Arabic.
     */
    public function prepareData(int $restaurantId, int $categoryId, int $massUnitIds): array
    {
        /**
         * Generate a unique English name, description, and ingredients for the dish.
         */
        $enName = fake()->unique()->name;
        $enDescription = FactoryHelper::times(5)->catchPhrase();
        $enIngredients = FactoryHelper::times(7)->catchPhrase();

        /**
         * Translate the English name, description, and ingredients into Arabic.
         */
        $arName = TranslateTextHelper::translate($enName);
        $arDescription = TranslateTextHelper::translate($enDescription);
        $arIngredients = TranslateTextHelper::translate($enIngredients);

        /**
         * Create a slug from the English name.
         */
        $slug = Str::slug($enName, '-');

        /**
         * Generate a random price and discount price for the dish.
         */
        $price = fake()->randomFloat(2, 100, 1000);
        $discountPrice = $price - fake()->randomFloat(2, 1, 10);

        /**
         * Return an array containing the dish's information.
         */
        return [
            'slug' => $slug,
            'restaurant_id' => $restaurantId,
            'category_id' => $categoryId,
            'price' => $price,
            'discount_price' => fake()->randomElement([$discountPrice, 0]),
            'package_count' => fake()->numberBetween(1, 6),
            'weight' => fake()->randomFloat(2, 0.1, 500),
            'unit_id' => $massUnitIds,
            'featured' => fake()->boolean(10),
            'deliverable' => fake()->boolean(70),
            'locales' => [
                ['locale' => 'en', 'name' => $enName, 'description' => $enDescription, 'ingredients' => $enIngredients],
                ['locale' => 'ar', 'name' => $arName, 'description' => $arDescription, 'ingredients' => $arIngredients],
            ],
        ];
    }
}
