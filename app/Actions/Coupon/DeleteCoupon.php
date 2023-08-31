<?php

namespace App\Actions\Coupon;

use App\Models\Coupon;

class DeleteCoupon
{
    public function execute(Coupon $coupon)
    {
        $isDelete = $coupon->delete();

        return $isDelete;
    }
}
