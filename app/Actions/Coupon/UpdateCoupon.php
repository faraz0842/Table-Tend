<?php

namespace App\Actions\Coupon;

use App\Models\Coupon;

class UpdateCoupon
{
    public function execute(array $data, Coupon $coupon)
    {
        $coupon->update($data);

        return $coupon;
    }
}
