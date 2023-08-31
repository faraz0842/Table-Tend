<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class SocialiteController extends Controller
{
    /**
     * Config the specified resource from storage.
     *
     * @param  string  $service
     * @return RedirectResponse
     */
    public function redirect($service): RedirectResponse
    {
        return Socialite::driver($service)->stateless()->redirect();
    }

    /**
     * Config the specified resource from storage.
     *
     * @param  string  $service
     * @return RedirectResponse
     */
    public function callback($service): RedirectResponse
    {
        try {
            $current_user = Socialite::driver($service)->stateless()->user();
            $user = User::where($service.'_id', $current_user->getId())->first();

            if ($user == null) {
                $newUser = User::create([
                    'name' => $current_user->getName(),
                    'email' => $current_user->getEmail(),
                    $service.'_id' => $current_user->getId(),
                ]);

                Auth::login($newUser);
                $newUser->assignRole(Role::where('name', 'ordinary')->first());

                return redirect()->route('home');
            } else {
                Auth::login($user);
                $user->assignRole(Role::where('name', 'ordinary')->first());

                return redirect()->route('home');
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
