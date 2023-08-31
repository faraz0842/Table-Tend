<?php

namespace App\Actions\User;

use App\Models\Driver;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UpdateUser
{
    /**
     * Update the given user and driver.
     *
     * @param array $data
     * @param \App\Models\User $user
     * @param \App\Models\Driver $driver
     * @return \App\Models\User
     */
    public function execute(array $data, User $user, Driver $driver)
    {
        $user->update($data);

        if (array_key_exists('roles', $data)) {
            $roles = Role::whereIn('id', $data['roles'])->get();

            $user->syncRoles($roles);

            if ($user->hasRole('driver') && !(Driver::where('user_id', $user->id)->exists())) {
                Driver::create([
                    'user_id' => $user->id,
                ]);
            } elseif (Driver::where('user_id', $user->id)->exists()) {
                Driver::where('user_id', $user->id)->delete();
            }
        } else {
            $user->syncRoles();
        }

        // if (!(Hash::check($data['password'], $user->password))) {
        //     Mail::send('admin.users.verify_email', $data, function ($message) use ($user) {
        //         $message->to($user->email);
        //         $message->subject('Testing');
        //     });
        // }
        if (array_key_exists('image', $data)) {
            $user->media()->delete();
            $user->addMedia($data['image'])->toMediaCollection('user.images');
        }

        return $user; // Returns an instance of \App\Models\User
    }
}
