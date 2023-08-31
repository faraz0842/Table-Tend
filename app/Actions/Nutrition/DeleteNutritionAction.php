<?php

namespace App\Actions\Nutrition;

use App\Models\Nutrition;

class DeleteNutritionAction
{
    /**
     * Delete nutrition and its translations.
     *
     * @param Nutrition $nutrition
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(Nutrition $nutrition)
    {
        $nutrition->deleteTranslations();
        $isDelete = $nutrition->delete();

        return $isDelete;
    }
}
