<?php

namespace App\Actions\MassUnit;

use App\Models\MassUnit;

class DeleteUnit
{
    /**
     * Delete the given mass unit.
     *
     * @param  MassUnit  $unit  The mass unit to delete.
     *
     * @return bool  `true` if the operation is successful, `false` otherwise.
     */
    public function execute(MassUnit $unit): bool
    {
        // Delete all translations associated with the mass unit
        $unit->deleteTranslations();

        // Delete the mass unit instance from the database
        $is_delete = $unit->delete();

        return $is_delete;
    }
}
