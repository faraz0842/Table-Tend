<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $categoryData) {
            // create category
            $category = Category::firstOrCreate([
                'slug' => $categoryData['slug'],
            ]);

            // create category locales
            foreach ($categoryData['locales'] as $localeData) {
                CategoryTranslation::firstOrCreate([
                    'category_id' => $category->id,
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
                'slug' => 'desert',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Desert'],
                    ['locale' => 'ar', 'name' => 'طبق حلوى'],
                ],
            ],
            [
                'slug' => 'sandwiches',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Sandwiches'],
                    ['locale' => 'ar', 'name' => 'شطائر'],
                ],
            ],
            [
                'slug' => 'burger',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Burger'],
                    ['locale' => 'ar', 'name' => 'برجر'],
                ],
            ],
            [
                'slug' => 'fast-food',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Fast Food'],
                    ['locale' => 'ar', 'name' => 'الطعام السريع'],
                ],
            ],
            [
                'slug' => 'beverages',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Beverages'],
                    ['locale' => 'ar', 'name' => 'المشروبات'],
                ],
            ],
            // add more categories as needed
        ];
    }
}
