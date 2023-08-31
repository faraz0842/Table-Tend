<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreStatusAction
{
    /**
     * Store a new order status.
     *
     * @param array $data
     * @return OrderStatus
     * @throws Exception
     */
    public function execute(array $data): OrderStatus
    {
        DB::beginTransaction();

        try {
            $status = OrderStatus::create($data);

            // Commit the transaction
            DB::commit();

            return $status;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
