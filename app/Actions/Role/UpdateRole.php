<?php

namespace App\Actions\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateRole
{
    public function execute($data, Role $role)
    {
        $role->update($data);

        if (array_key_exists('permission_checkbox', $data)) {
            $permissions = Permission::whereIn('id', $data['permission_checkbox'])->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions();
        }

        return $role;
    }
}
