<?php

namespace App\Actions\Driver;

use App\Models\User;

class DeleteDriver
{
    /**
     * Deletes the specified driver user from the database.
     *
     * @param  User  $user The user to be deleted
     *
     * @return bool Whether the user was successfully deleted or not
     */
    public function execute(User $user): bool
    {
        $isDeleted = $user->delete();

        return $isDeleted;
    }
}
