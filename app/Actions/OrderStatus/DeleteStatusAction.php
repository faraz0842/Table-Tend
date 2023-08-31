<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;

class DeleteStatusAction
{
    /**
     * Deletes the specified order status.
     *
     * @param OrderStatus $status The order status to delete.
     *
     * @return bool True if the order status was successfully deleted, false otherwise.
     */
    public function execute(OrderStatus $status): bool
    {
        $status->deleteTranslations();
        $isDeleted = $status->delete();

        return $isDeleted;
    }
}
