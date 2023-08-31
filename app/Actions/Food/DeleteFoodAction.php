<?php

namespace App\Actions\Food;

use App\Models\Food;

class DeleteFoodAction
{
    /**
     * Delete food and its translations.
     *
     * @param Food $food
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(Food $food)
    {
        $food->media()->delete();
        $food->extra()->delete();
        $food->reviews()->delete();
        $food->deleteTranslations();
        $isDeleted = $food->delete();
        return $isDeleted;
    }
}
