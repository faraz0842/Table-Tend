<?php

namespace App\Actions\Coupon;

use App\Models\Coupon;

class StoreCoupon
{
    public function execute(array $data)
    {
        $coupon = Coupon::create($data);

        return $coupon;
    }
}
