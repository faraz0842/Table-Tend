<?php

namespace App\Actions\SettingType;

use App\Models\SettingType;

class DeleteSettingTypeAction
{
    /**
     * Delete the SettingType.
     *
     * @param SettingType $SettingType
     * @return array
     */
    public function execute(SettingType $SettingType): array
    {
        $SettingType->deleteTranslations();
        $data['isDelete'] = $SettingType->delete();

        return $data;
    }
}
