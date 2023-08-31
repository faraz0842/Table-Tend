<?php

namespace App\Actions\DiscountType;

use App\Models\DiscountType;

class DeleteDiscountTypeAction
{
    /**
     * Deletes a given discount along with all associated media and translations
     *
     * @param  Discount  $discount
     * @return bool  Returns true if the discount was successfully deleted, false otherwise
     */
    public function execute(DiscountType $discount): bool
    {
        // Delete all translations associated with the discount
        $isTranslationsDeleted = $discount->deleteTranslations();

        // Attempt to delete the discount
        $isDeleted = $discount->delete();

        return $isDeleted && $isTranslationsDeleted;
    }
}
