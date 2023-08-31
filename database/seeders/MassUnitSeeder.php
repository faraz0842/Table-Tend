<?php

namespace Database\Seeders;

use App\Models\MassUnit;
use App\Models\MassUnitTranslation;
use Illuminate\Database\Seeder;

class MassUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $massUnitData) {
            // create mass unit
            $massUnit = MassUnit::firstOrCreate([
                'slug' => $massUnitData['slug'],
            ]);

            // create mass unit locales
            foreach ($massUnitData['locales'] as $localeData) {
                MassUnitTranslation::firstOrCreate([
                    'mass_unit_id' => $massUnit->id,
                    'locale' => $localeData['locale'],
                    'short_form' => $localeData['short_form'],
                    'full_form' => $localeData['full_form'],
                ]);
            }
        }
    }

    /**
     * Prepare data for mass units & mass_unit_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'kilogram',
                'locales' => [
                    ['locale' => 'en', 'short_form' => 'Kg', 'full_form' => 'Kilogram'],
                    ['locale' => 'ar', 'short_form' => 'كغ', 'full_form' => 'كيلوغرام'],
                ],
            ],
            [
                'slug' => 'gram',
                'locales' => [
                    ['locale' => 'en', 'short_form' => 'g', 'full_form' => 'Gram'],
                    ['locale' => 'ar', 'short_form' => 'غ', 'full_form' => 'غرام'],
                ],
            ],
            [
                'slug' => 'milligram',
                'locales' => [
                    ['locale' => 'en', 'short_form' => 'mg', 'full_form' => 'Milligram'],
                    ['locale' => 'ar', 'short_form' => 'مج', 'full_form' => 'مليغرام'],
                ],
            ],
            // add more mass units as needed
        ];
    }
}
