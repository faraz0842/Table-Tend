<?php

namespace Database\Seeders;

use App\Models\ExtraGroup;
use App\Models\ExtraGroupTranslation;
use Illuminate\Database\Seeder;

class ExtraGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $extraGroupData) {
            // create extra group
            $extraGroup = ExtraGroup::firstOrCreate([
                'slug' => $extraGroupData['slug'],
            ]);

            // create extra group locales
            foreach ($extraGroupData['locales'] as $localeData) {
                ExtraGroupTranslation::firstOrCreate([
                    'extra_group_id' => $extraGroup->id,
                    'locale' => $localeData['locale'],
                    'name' => $localeData['name'],
                ]);
            }
        }
    }

    /**
     * Prepare data for extra_group & extra_group_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'size',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Size'],
                    ['locale' => 'ar', 'name' => 'مقاس'],
                ],
            ],
            [
                'slug' => 'taste',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Taste'],
                    ['locale' => 'ar', 'name' => 'ذوق'],
                ],
            ],
            [
                'slug' => 'capacity',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Capacity'],
                    ['locale' => 'ar', 'name' => 'سعة'],
                ],
            ],
            // add more extra groups as needed
        ];
    }
}
