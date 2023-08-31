<?php

namespace App\Actions\Faq;

use App\Models\Faq;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreFaqAction
{
    /**
     * @param array $data
     * @return Faq
     * @throws Exception
     */
    public function execute(array $data): Faq
    {
        DB::beginTransaction();

        try {
            $faq = Faq::create($data);

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
