<?php

namespace Database\Seeders;

use App\Helpers\FactoryHelper;
use App\Helpers\TranslateTextHelper;
use App\Models\Extra;
use App\Models\ExtraGroup;
use App\Models\ExtraTranslation;
use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ExtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all Extra Group ids from the database
        $extraGroupIds = ExtraGroup::pluck('id')->toArray();

        // Get all Foods from the database
        $foods = Food::all();

        /**
         * Loop through each Food, create between 1 and 5 Extras
         * for every 5th Food without any existing Extras
         */
        foreach ($foods as $key => $food) {
            if ($key % 5 === 0 && $food->extras()->count() === 0) {
                for ($i = 0; $i < fake()->numberBetween(1, 5); $i++) {
                    $extraGroupId = $extraGroupIds[array_rand($extraGroupIds)];

                    $extraData = $this->prepareData($food->id, $extraGroupId);

                    /**
                     * First, create or retrieve an existing Extra based on the slug,
                     * food_id and extra_group_id
                     */
                    $extra = Extra::firstOrCreate(Arr::except($extraData, ['locales']));

                    /**
                     * Then, create or update the Extra's locales
                     * (name and description in English and Arabic)
                     */
                    $this->createOrUpdateExtraLocales($extra, $extraData['locales']);
                }
            }
        }
    }

    /**
     * Create or update Extra Locales for a given Extra.
     *
     * @param Extra $extra
     * @param array $locales
     * @return void
     */
    public function createOrUpdateExtraLocales(Extra $extra, array $locales): void
    {
        $enLocale = collect($locales)->firstWhere('locale', 'en');
        $arLocale = collect($locales)->firstWhere('locale', 'ar');

        $enLocale = Arr::except($enLocale, ['locale']);
        $arLocale = Arr::except($arLocale, ['locale']);

        // Create or update the Extra's English locale
        ExtraTranslation::firstOrCreate(
            ['extra_id' => $extra->id, 'locale' => 'en'],
            $enLocale
        );

        // Create or update the Extra's Arabic locale
        ExtraTranslation::firstOrCreate(
            ['extra_id' => $extra->id, 'locale' => 'ar'],
            $arLocale
        );
    }

    /**
     * This function generates data needed to create a new Extra.
     * @param int $foodId The ID of the Food to which the new Extra belongs.
     * @param int $extraGroupId The ID of the ExtraGroup to which the new Extra belongs.
     * @return array An array of data to create the new Extra.
     */
    public function prepareData(int $foodId, int $extraGroupId): array
    {
        // Generate a unique ID for the new Extra
        $extraId = Extra::max('id') + 1;

        // Generate English and Arabic names and descriptions for the new Extra
        $enName = fake()->unique()->name . " " . $extraId;
        $enDescription = FactoryHelper::times(5)->catchPhrase();
        $arName = TranslateTextHelper::translate($enName);
        $arDescription = TranslateTextHelper::translate($enDescription);

        // Generate a slug for the new Extra based on the English name
        $slug = Str::slug($enName, '-');

        // Return an array of data to create the new Extra
        return [
            'slug' => $slug,
            'food_id' => $foodId,
            'extra_group_id' => $extraGroupId,
            'price' => fake()->randomFloat(2, 10, 50),
            'locales' => [
                ['locale' => 'en', 'name' => $enName, 'description' => $enDescription],
                ['locale' => 'ar', 'name' => $arName, 'description' => $arDescription],
            ],
        ];
    }
}
