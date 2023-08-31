<?php

namespace Database\Seeders;

use App\Models\SettingType;
use App\Models\SettingTypeTranslation;
use Illuminate\Database\Seeder;

class SettingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $settingTypeData) {
            // create settingType
            $setting_type = SettingType::firstOrCreate([
                'slug' => $settingTypeData['slug'],
            ]);

            // create settingType locales
            foreach ($settingTypeData['locales'] as $localeData) {
                SettingTypeTranslation::firstOrCreate([
                    'setting_type_id' => $setting_type->id,
                    'locale' => $localeData['locale'],
                    'type' => $localeData['type'],
                ]);
            }
        }
    }

    /**
     * Prepare data for setting_types & setting_type_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'web',
                'locales' => [
                    ['locale' => 'en', 'type' => 'Web'],
                    ['locale' => 'ar', 'type' => 'الويب'],
                ],
            ],
            [
                'slug' => 'app',
                'locales' => [
                    ['locale' => 'en', 'type' => 'App'],
                    ['locale' => 'ar', 'type' => 'تطبيق جوال'],
                ],
            ],
            [
                'slug' => 'web_app',
                'locales' => [
                    ['locale' => 'en', 'type' => 'Web & App'],
                    ['locale' => 'ar', 'type' => 'تطبيقات الويب والجوال'],
                ],
            ],
        ];
    }
}
