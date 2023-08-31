<?php

namespace App\Actions\Extra;

use App\Models\Extra;

class DeleteExtraAction
{
    /**
     * Delete Extra and its translations.
     *
     * @param Extra $extra
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(Extra $extra)
    {
        $extra->media()->delete();
        $extra->deleteTranslations();
        $isDeleted = $extra->delete();

        return $isDeleted;
    }
}
