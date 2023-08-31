<?php

namespace App\Actions\FaqCategory;

use App\Models\FaqCategory;

class DeleteFaqCategoryAction
{
    /**
     * Execute the action to delete a FaqCategory.
     *
     * @param  FaqCategory $faqCategory
     * @return bool
     */
    public function execute(FaqCategory $faqCategory): bool
    {
        // Delete all translations associated with the faqCategory
        $faqCategory->deleteTranslations();

        // Delete all data associated with the faqCategory
        $isDeleted = $faqCategory->delete();

        return $isDeleted;
    }
}
