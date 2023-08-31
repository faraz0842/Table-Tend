<?php

namespace App\Actions\AppTheme;

use App\Models\Setting;

class StoreThemeAction
{
    /**
     * Store theme data in the settings table.
     *
     * @param array $data The theme data to store.
     * @param mixed $request The HTTP request object.
     *
     * @return array The stored theme data.
     */
    public function execute(array $data, $request)
    {
        $data = [
            'key' => [
                'main_color_light' => 'app_main_color_light',
                'main_color_dark' => 'app_main_color_dark',
                'second_color_light' => 'app_second_color_light',
                'second_color_dark' => 'app_second_color_dark',
                'accent_color_light' => 'app_accent_color_light',
                'accent_color_dark' => 'app_accent_color_dark',
                'background_color_light' => 'app_background_color_light',
                'background_color_dark' => 'app_background_color_dark',
            ],
            'value' => [
                'main_color_light' => $request->input('main_color_light'),
                'main_color_dark' => $request->input('main_color_dark'),
                'second_color_light' => $request->input('second_color_light'),
                'second_color_dark' => $request->input('second_color_dark'),
                'accent_color_light' => $request->input('accent_color_light'),
                'accent_color_dark' => $request->input('accent_color_dark'),
                'background_color_light' => $request->input('background_color_light'),
                'background_color_dark' => $request->input('background_color_dark'),
            ],
            'setting_type_id' => 2,
        ];

        foreach ($data['key'] as $field => $key) {
            $tableData = Setting::where('key', $key)->get();
            if ($tableData->isEmpty()) {
                Setting::create([
                    'key' => $key,
                    'value' => $data['value'][$field],
                    'setting_type_id' => $data['setting_type_id'],
                ]);
            } else {
                $setting = $tableData->first();
                $setting->update([
                    'value' => $data['value'][$field],
                    'setting_type_id' => $data['setting_type_id'],
                ]);
            }
        }

        return $data;
    }
}
