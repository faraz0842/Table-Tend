<?php

namespace App\Actions\DistanceUnit;

use App\Models\DistanceUnit;

class DeleteDistanceUnit
{
    public function execute(DistanceUnit $distanceUnit)
    {
        $data['isDelete'] = $distanceUnit->delete();

        return $data;
    }
}
