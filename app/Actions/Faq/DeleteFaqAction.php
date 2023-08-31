<?php

namespace App\Actions\Faq;

use App\Models\Faq;

class DeleteFaqAction
{
    /**
     * Deletes Faq and its translations.
     *
     * @param Faq $faq
     * @return bool
     */
    public function execute(Faq $faq): bool
    {
        $faq->deleteTranslations();
        $is_delete = $faq->delete();

        return $is_delete;
    }
}
