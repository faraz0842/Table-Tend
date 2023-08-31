<?php

namespace App\Actions\FaqCategory;

use App\Models\FaqCategory;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreFaqCategoryAction
{
    /**
     * Create a new faq category instance and store it in the database.
     *
     * @param  array  $data   Data for creating a new faq category instance.
     *
     * @return FaqCategory
     * @throws Exception
     */
    public function execute(array $data): FaqCategory
    {
        DB::beginTransaction();

        try {
            $faqCategory = FaqCategory::create($data);
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
