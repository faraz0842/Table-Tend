<?php

namespace App\Actions\RestaurantPayout;

use App\Models\RestaurantPayout;

class StorePayoutAction
{
    /**
    * Store a newly created DriverPayout in storage.
    *
    * @param  array  $data
    * @return RestaurantPayout
    * @throws Exception
    */
    public function execute(array $data)
    {
        $restaurantPayout = RestaurantPayout::create($data);

        return $restaurantPayout;
    }
}
