<?php

namespace Database\Seeders;

use App\Models\DiscountType;
use App\Models\DiscountTypeTranslation;
use Illuminate\Database\Seeder;

class DiscountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $discountTypeData) {
            // create discount_type
            $discount_type = DiscountType::firstOrCreate([
                'slug' => $discountTypeData['slug'],
                'color' => $discountTypeData['color'],
            ]);

            // create discount_type locales
            foreach ($discountTypeData['locales'] as $localeData) {
                DiscountTypeTranslation::firstOrCreate([
                    'discount_type_id' => $discount_type->id,
                    'locale' => $localeData['locale'],
                    'name' => $localeData['name'],
                ]);
            }
        }
    }

    /**
     * Prepare data for discount_type & discount_type_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'fixed',
                'color' => '#3B71CA',
                'locales' => [
                    ['locale' => 'en', 'name' => 'fixed'],
                    ['locale' => 'ar', 'name' => 'مُثَبَّت'],
                ],
            ],
            [
                'slug' => 'percentage',
                'color' => '#14A44D',
                'locales' => [
                    ['locale' => 'en', 'name' => 'percentage'],
                    ['locale' => 'ar', 'name' => 'نسبة مئوية'],
                ],
            ],
            // add more discount type as needed
        ];
    }
}
