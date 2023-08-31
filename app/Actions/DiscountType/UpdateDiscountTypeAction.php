<?php

namespace App\Actions\DiscountType;

use App\Models\DiscountType;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateDiscountTypeAction
{
    public function execute(array $data, DiscountType $discount)
    {
        DB::beginTransaction();

        try {
            $discount->update($data);

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
