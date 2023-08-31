<?php

namespace App\Actions\MobileSetting;

use App\Models\Setting;

class StoreGlobalSettingAction
{
    /**
     * Execute the action to store global settings.
     *
     * @param array $data
     * @param $request
     * @return array
     */
    public function execute(array $data, $request): array
    {
        $data = [
            'key' => [
                'google_maps_key' => 'app_google_map',
                'default_unit_of_distance' => 'app_default_distance',
                'language' => 'app_language',
                'application_version' => 'app_version',
                'show_version' => 'app_show_version',
            ],
            'value' => [
                'google_maps_key' => $request->input('google_maps_key'),
                'default_unit_of_distance' => $request->input('default_unit_of_distance'),
                'language' => $request->input('language'),
                'application_version' => $request->input('application_version'),
                'show_version' => $request->input('show_version'),
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
