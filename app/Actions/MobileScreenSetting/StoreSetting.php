<?php

namespace App\Actions\MobileScreenSetting;

use App\Models\MobileScreenSetting;

class StoreSetting
{
    public function execute(array $data)
    {
        $mobileScreen = MobileScreenSetting::create($data);

        return $mobileScreen;
    }
}
