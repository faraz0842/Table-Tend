<?php

namespace App\Actions\User;

use App\Models\User;

class DeleteUser
{
    public function execute(User $user)
    {
        $user->media()->delete();
        $user->syncRoles();
        $user->delete();
    }
}
