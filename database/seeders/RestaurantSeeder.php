<?php

namespace Database\Seeders;

use App\Helpers\FactoryHelper;
use App\Helpers\TranslateTextHelper;
use App\Models\Restaurant;
use App\Models\RestaurantTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all Restaurants Count
        $restaurantsCount = Restaurant::count();

        $count = abs($restaurantsCount - config('seederlimit.restaurant_seeder_limit'));

        for ($i = 1; $i <= $count; $i++) {
            $restaurantData = $this->prepareData();
            $restaurant = Restaurant::firstOrCreate(Arr::except($restaurantData, ['locales']));

            $this->createOrUpdateRestaurantLocales($restaurant, $restaurantData['locales']);
        }
    }

    /**
     * Creates or updates restaurant locales in the database.
     *
     * @param Restaurant $restaurant The restaurant object to update.
     * @param array $locales An array of locale data to create or update.
     * @return void
     */
    public function createOrUpdateRestaurantLocales(Restaurant $restaurant, array $locales): void
    {
        // Extract the locale data for the 'en' and 'ar' locales
        $enLocale = collect($locales)->firstWhere('locale', 'en');
        $arLocale = collect($locales)->firstWhere('locale', 'ar');

        // Remove the 'locale' key from the locale data
        $enLocale = Arr::except($enLocale, ['locale']);
        $arLocale = Arr::except($arLocale, ['locale']);

        // Create or update the 'en' locale for the restaurant
        RestaurantTranslation::firstOrCreate(
            ['restaurant_id' => $restaurant->id, 'locale' => 'en', 'name' => $enLocale['name']],
            $enLocale
        );

        // Create or update the 'ar' locale for the restaurant
        RestaurantTranslation::firstOrCreate(
            ['restaurant_id' => $restaurant->id, 'locale' => 'ar', 'name' => $arLocale['name']],
            $arLocale
        );
    }

    /**
     * Prepare data for Restaurant Seeder.
     *
     * @return array
     */
    public function prepareData(): array
    {
        $restaurantId = Restaurant::max('id') + fake()->numberBetween(1, 50);
        $enName = fake()->unique()->name . " " . $restaurantId;
        $enDescription = FactoryHelper::times(5)->catchPhrase();
        $enAddress = fake('en_US')->address();

        $arName = TranslateTextHelper::translate($enName);
        $arDescription = TranslateTextHelper::translate($enDescription);
        $arAddress = TranslateTextHelper::translate($enAddress);

        $slug = Str::slug($enName, '-');

        return [
            'slug' => $slug,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'phone' => fake()->regexify('^(\+92)[0-9]{10}$'),
            'mobile' => fake()->optional()->regexify('^(\+92)[0-9]{10}$'),
            'admin_commission' => fake()->randomFloat(2, 0, 100),
            'delivery_fee' => fake()->numberBetween(0, 50),
            'delivery_range' => fake()->randomFloat(2, 0, 100),
            'default_tax' => fake()->numberBetween(0, 17),
            'closed' => fake()->boolean,
            'active' => fake()->boolean,
            'availability_for_delivery' => fake()->boolean,
            'locales' => [
                ['locale' => 'en', 'name' => $enName, 'description' => $enDescription, 'address' => $enAddress],
                ['locale' => 'ar', 'name' => $arName, 'description' => $arDescription, 'address' => $arAddress],
            ],
        ];
    }
}
