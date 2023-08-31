<?php

namespace Database\Seeders;

use App\Helpers\FactoryHelper;
use App\Helpers\TranslateTextHelper;
use App\Models\Food;
use App\Models\Nutrition;
use App\Models\NutritionTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all the food items in the database
        $foods = Food::all();

        /**
         * Loop through all the food items and create
         * Nutrition's for every 5th item if none exists.
         */
        foreach ($foods as $key => $food) {
            /**
             * Check if the key is a multiple of 5 and the food
             * item doesn't have any nutrition's already
             */
            if ($key % 5 === 0 && $food->nutrition()->count() === 0) {
                // Create a random number of nutrition's (between 1 and 5) for this food item
                for ($i = 0; $i < fake()->numberBetween(1, 5); $i++) {
                    // Prepare the nutrition data for this food item
                    $nutritionData = $this->prepareData($food->id);

                    // Create a new nutrition item or find an existing one with the same slug
                    $nutrition = Nutrition::firstOrCreate(Arr::except($nutritionData, ['locales']));

                    // Create or update the nutrition locales for this nutrition item
                    $this->createOrUpdateNutritionLocales($nutrition, $nutritionData['locales']);
                }
            }
        }
    }

    /**
     * Create or update NutritionLocales for a given Nutrition item.
     *
     * @param Nutrition $nutrition
     * @param array $locales
     * @return void
     */
    public function createOrUpdateNutritionLocales(Nutrition $nutrition, array $locales): void
    {
        // Get the English and Arabic locales from the locales array
        $enLocale = collect($locales)->firstWhere('locale', 'en');
        $arLocale = collect($locales)->firstWhere('locale', 'ar');

        // Remove the locale key from the locales array
        $enLocale = Arr::except($enLocale, ['locale']);
        $arLocale = Arr::except($arLocale, ['locale']);

        // Create or update the English locale for this nutrition item
        NutritionTranslation::firstOrCreate(
            ['nutrition_id' => $nutrition->id, 'locale' => 'en'],
            $enLocale
        );

        // Create or update the Arabic locale for this nutrition item
        NutritionTranslation::firstOrCreate(
            ['nutrition_id' => $nutrition->id, 'locale' => 'ar'],
            $arLocale
        );
    }

    /**
     * Prepare Nutrition data for a given Food item.
     *
     * @param int $foodId
     * @return array
     */
    public function prepareData(int $foodId): array
    {
        /**
         * Generate a random English name for this nutrition item using
         * the catchPhrase method from the FactoryHelper
         */
        $enName = FactoryHelper::times(1)->catchPhrase();

        /**
         * Translate the English name to Arabic using the
         * translate method from the TranslateTextHelper
         */
        $arName = TranslateTextHelper::translate($enName);

        // Generate a slug from the English name using the Str::slug helper
        $slug = Str::slug($enName, '-');

        // Return an array with the nutrition data and the locales array
        return [
            'slug' => $slug,
            'food_id' => $foodId,
            'quantity' => fake()->numberBetween(5, 20),
            'locales' => [
                ['locale' => 'en', 'name' => $enName],
                ['locale' => 'ar', 'name' => $arName],
            ],
        ];
    }
}
