<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqCategoryTranslation;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $faqCategoryData) {
            // create faq category
            $faqCategory = FaqCategory::firstOrCreate([
                'slug' => $faqCategoryData['slug'],
            ]);

            // create faq category locales
            foreach ($faqCategoryData['locales'] as $localeData) {
                FaqCategoryTranslation::firstOrCreate([
                    'faq_category_id' => $faqCategory->id,
                    'locale' => $localeData['locale'],
                    'name' => $localeData['name'],
                ]);
            }
        }
    }

    /**
     * Prepare data for faq_category & faq_category_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'services',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Services'],
                    ['locale' => 'ar', 'name' => 'خدمات'],
                ],
            ],
            [
                'slug' => 'miscellaneous',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Miscellaneous'],
                    ['locale' => 'ar', 'name' => 'متنوع'],
                ],
            ],
            [
                'slug' => 'foods',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Foods'],
                    ['locale' => 'ar', 'name' => 'أغذية'],
                ],
            ],
            [
                'slug' => 'delivery',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Delivery'],
                    ['locale' => 'ar', 'name' => 'توصيل'],
                ],
            ],
            // add more faq categories as needed
        ];
    }
}
