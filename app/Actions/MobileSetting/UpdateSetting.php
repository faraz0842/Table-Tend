<?php

namespace App\Actions\MobileSetting;

use App\Models\MobileSetting;

class UpdateSetting
{
    public function execute(array $data, MobileSetting $mobileSetting)
    {
        $mobileSetting->update($data);

        return $mobileSetting;
    }
}
