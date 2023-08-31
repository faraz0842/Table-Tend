<?php

namespace App\Actions\DiscountType;

use App\Models\DiscountType;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreDiscountTypeAction
{
    public function execute(array $data)
    {
        DB::beginTransaction();

        try {
            $discount = DiscountType::create($data);

            // Commit the transaction
            DB::commit();

            return $discount;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
