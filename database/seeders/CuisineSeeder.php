<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\CuisineTranslation;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $cuisineData) {
            // create cuisine
            $cuisine = Cuisine::firstOrCreate([
                'slug' => $cuisineData['slug'],
            ]);

            // create cuisine locales
            foreach ($cuisineData['locales'] as $localeData) {
                CuisineTranslation::firstOrCreate([
                    'cuisine_id' => $cuisine->id,
                    'locale' => $localeData['locale'],
                    'name' => $localeData['name'],
                ]);
            }
        }
    }

    /**
     * Prepare data for category & category_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'pakistani-cuisines',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Pakistani Cuisines'],
                    ['locale' => 'ar', 'name' => 'المطابخ الباكستانية'],
                ],
            ],
            [
                'slug' => 'indian-cuisines',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Indian Cuisines'],
                    ['locale' => 'ar', 'name' => 'المطابخ الهندية'],
                ],
            ],
            [
                'slug' => 'chinese-cuisines',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Chinese Cuisines'],
                    ['locale' => 'ar', 'name' => 'المطابخ الصينية'],
                ],
            ],
            [
                'slug' => 'italian-cuisines',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Italian Cuisines'],
                    ['locale' => 'ar', 'name' => 'المطابخ الإيطالية'],
                ],
            ],
            // add more cuisines as needed
        ];
    }
}
