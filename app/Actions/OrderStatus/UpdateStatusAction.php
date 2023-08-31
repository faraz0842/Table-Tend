<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateStatusAction
{
    /**
     * Updates the given order status with the provided data.
     * Returns the updated OrderStatus instance.
     *
     * @param array $data The data to update the order status with.
     * @param OrderStatus $status The order status to update.
     * @return OrderStatus|null The updated OrderStatus instance, or null if an error occurred.
     *
     * @throws Exception If a database operation fails.
     */
    public function execute(array $data, OrderStatus $status): ?OrderStatus
    {
        DB::beginTransaction();

        try {
            $status->update($data);

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
