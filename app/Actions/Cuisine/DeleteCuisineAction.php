<?php

namespace App\Actions\Cuisine;

use App\Models\Cuisine;

class DeleteCuisineAction
{
    /**
     * Deletes a given cuisine along with all associated media and translations
     *
     * @param  Cuisine  $cuisine
     * @return bool  Returns true if the cuisine was successfully deleted, false otherwise
     */
    public function execute(Cuisine $cuisine): bool
    {
        // Delete all media associated with the cuisine
        $cuisine->media()->delete();

        // Delete all translations associated with the cuisine
        $isTranslationsDeleted = $cuisine->deleteTranslations();

        // Attempt to delete the cuisine
        $isDeleted = $cuisine->delete();

        return $isDeleted && $isTranslationsDeleted;
    }
}
