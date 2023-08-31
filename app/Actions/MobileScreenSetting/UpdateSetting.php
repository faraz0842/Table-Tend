<?php

namespace App\Actions\MobileScreenSetting;

use App\Models\MobileScreenSetting;

class UpdateSetting
{
    public function execute(array $data, MobileScreenSetting $mobileScreen)
    {
        $mobileScreen->update($data);

        return $mobileScreen;
    }
}
