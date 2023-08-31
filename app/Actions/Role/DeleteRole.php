<?php

namespace App\Actions\Role;

use Spatie\Permission\Models\Role;

class DeleteRole
{
    public function execute(Role $role)
    {
        $role->syncPermissions();
        $role->delete();
    }
}
