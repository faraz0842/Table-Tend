<?php

namespace App\Actions\Driver;

use App\Models\Driver;

class UpdateDriver
{
    /**
     * Update the specified driver with the provided data.
     *
     * @param  array  $data
     * @param  Driver  $driver
     * @return Driver
     */
    public function execute(array $data, Driver $driver): Driver
    {
        $driver->update($data);

        return $driver;
    }
}
