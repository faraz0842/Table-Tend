<?php

namespace App\Actions\SettingType;

use App\Models\SettingType;
use App\Models\SettingTypeTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateSettingTypeAction
{
    /**
     * Update the model in the database.
     *
     * @param  array  $data
     * @return SettingType
     */
    public function execute(array $data, SettingType $SettingType): SettingType
    {
        DB::beginTransaction();

        try {
            $SettingType->update($data);

            foreach ($data as $locale => $value) {
                if (is_array($value)) {
                    $is_exist = SettingTypeTranslation::where('setting_type_id', $SettingType->id)->where('locale', $locale)->first();
                    if ($is_exist) {
                        $is_exist->update([
                            'type' => $value['type'],
                        ]);
                    } else {
                        SettingTypeTranslation::create([
                            'setting_type_id' => $SettingType->id,
                            'locale' => $locale,
                            'type' => $value['type'],
                        ]);
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return $SettingType;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
