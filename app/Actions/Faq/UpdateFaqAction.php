<?php

namespace App\Actions\Faq;

use App\Models\Faq;
use App\Models\FaqTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateFaqAction
{
    /**
     * Update the provided Faq instance with the given data values.
     *
     * @param array $data The data to update the Faq instance with
     * @param Faq $faq The Faq instance to update
     * @param FaqTranslation $faqLocale The FaqTranslation instance associated with the Faq being updated
     *
     * @return Faq The updated Faq instance
     *
     * @throws Exception If an error occurs while updating the Faq instance
     */
    public function execute(array $data, Faq $faq): Faq
    {
        DB::beginTransaction();

        try {
            $faq->update($data);

            // Commit the transaction
            DB::commit();

            return $faq;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
