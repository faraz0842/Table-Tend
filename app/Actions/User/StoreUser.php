<?php

namespace App\Actions\User;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StoreUser
{
    /**
     * Store a new user.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function execute($data = [])
    {
        $data['password'] = Hash::make($data['password']); // Hashing the password
        $user = User::create($data);

        if (array_key_exists('roles', $data)) {
            $roles = Role::whereIn('id', $data['roles'])->get();
            foreach ($roles as $role) {
                $user->assignRole($role);
            }
        }
        if ($user->hasRole('driver')) {
            Driver::create([
                'user_id' => $user->id,
            ]);
        }
        if (isset($data['image'])) {
            $user->addMedia($data['image'])->toMediaCollection('user.images');
        }

        return $user; // Returns an instance of \App\Models\User
    }
}
