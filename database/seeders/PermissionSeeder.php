<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = [
            'user.index',
            'user.create',
            'user.store',
            'user.edit',
            'user.update',
            'user.delete',
            'role.index',
            'role.create',
            'role.store',
            'role.edit',
            'role.update',
            'role.delete',
            'permission.index',
            'permission.create',
            'permission.store',
            'permission.edit',
            'permission.update',
            'permission.delete',
            'permission.synchronize',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
