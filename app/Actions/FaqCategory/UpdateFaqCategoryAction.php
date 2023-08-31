<?php

namespace App\Actions\FaqCategory;

use App\Models\FaqCategory;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateFaqCategoryAction
{
    /**
     * Execute the action to update a FaqCategory.
     *
     * @param array $data The data to update the FaqCategory with.
     * @param FaqCategory $faqCategory The FaqCategory instance to update.
     *
     * @return FaqCategory The updated FaqCategory instance.
     *
     * @throws Exception If an error occurs during the transaction, it is caught and re-thrown.
     */
    public function execute(array $data, FaqCategory $faqCategory): FaqCategory
    {
        DB::beginTransaction();

        try {
            $faqCategory->update($data);

            // Commit the transaction
            DB::commit();

            return $faqCategory;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
