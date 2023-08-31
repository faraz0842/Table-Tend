<?php

namespace App\Actions\DriverPayout;

use App\Models\DriverPayout;

class StoreDriverPayoutAction
{
    /**
    * Store a newly created DriverPayout in storage.
    *
    * @param  array  $data
    * @return DriverPayout
    * @throws Exception
    */
    public function execute(array $data)
    {
        $driverPayout = DriverPayout::create($data);

        return $driverPayout;
    }
}
