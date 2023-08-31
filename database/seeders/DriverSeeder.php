<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Helpers\GlobalHelper;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $drivers = User::role(RolesEnum::DRIVER->value)->get();

        $role = Role::where('name', RolesEnum::DRIVER)->first();

        $permission = Permission::whereIn('name', [
            'user.index',
            'role.index',
            'permission.index',
        ])->get();

        $role->givePermissionTo($permission);

        if (count($drivers) < config('seederlimit.driver_seeder_limit')) {
            //get limit how many records need to be inserted
            $count = abs(count($drivers) - config('seederlimit.driver_seeder_limit'));

            for ($i = 1; $i <= $count; $i++) {
                //prepare fake email
                $generated_email = GlobalHelper::generateFakeEmail('driver');

                //add user in users table
                $user = User::firstOrCreate(
                    [
                        'email' => $generated_email,
                    ],
                    User::factory()->make([
                        'email' => $generated_email,
                    ])->makeVisible('password')->toArray()
                );

                //add inserted user in drivers table
                Driver::factory()->create([
                    'user_id' => $user->id,
                ]);

                //assign driver role to inserted user
                $user->assignRole($role);
            }
        }
    }
}
