<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\DeliveryAddress;
use App\Models\User;
use Illuminate\Database\Seeder;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::role(RolesEnum::CUSTOMER->value)->get();

        $users->each(function ($user) {
            $is_address_exist = $user->deliveryAddresses()->count();
            if ($is_address_exist === 0) {
                $deliveryAddresses = DeliveryAddress::factory()
                    ->count(fake()->numberBetween(1, config('seederlimit.delivery_address_seeder_limit')))
                    ->make();

                $deliveryAddresses->each(function ($address) use ($user) {
                    if ($address->is_default) {
                        $user->deliveryAddresses()->update(['is_default' => false]);
                    }

                    $user->deliveryAddresses()->save($address);
                });

                if (! $user->deliveryAddresses()->defaultAddress($user->id)) {
                    $defaultAddress = $deliveryAddresses->random();
                    $defaultAddress->is_default = true;
                    $defaultAddress->save();
                }
            }
        });
    }
}
