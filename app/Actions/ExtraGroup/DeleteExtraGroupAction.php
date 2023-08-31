<?php

namespace App\Actions\ExtraGroup;

use App\Models\ExtraGroup;

class DeleteExtraGroupAction
{
    /**
     * Delete extraGroup and its translations.
     *
     * @param ExtraGroup $extraGroup
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(ExtraGroup $extraGroup)
    {
        $extraGroup->extra()->delete();
        $extraGroup->deleteTranslations();
        $isDelete = $extraGroup->delete();

        return $isDelete;
    }
}
