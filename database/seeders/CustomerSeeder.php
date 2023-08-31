<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Helpers\GlobalHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $customers = User::role(RolesEnum::CUSTOMER->value)->get();

        $role = Role::where('name', RolesEnum::CUSTOMER)->first();

        $permission = Permission::whereIn('name', [
            'user.index',
            'role.index',
            'permission.index',
        ])->get();

        $role->givePermissionTo($permission);

        if (count($customers) < config('seederlimit.customer_seeder_limit')) {
            //get limit how many records need to be inserted
            $count = abs(count($customers) - config('seederlimit.customer_seeder_limit'));

            for ($i = 1; $i <= $count; $i++) {
                //prepare fake email
                $generated_email = GlobalHelper::generateFakeEmail('customer');

                //add user in users table
                $user = User::firstOrCreate(
                    [
                        'email' => $generated_email,
                    ],
                    User::factory()->make([
                        'email' => $generated_email,
                    ])->makeVisible('password')->toArray()
                );

                //assign driver role to inserted user
                $user->assignRole($role);
            }
        }
    }
}
