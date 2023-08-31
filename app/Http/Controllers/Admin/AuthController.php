<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\LogoutRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * Function to view register page
     *
     * @return View
     */
    public function registerView(): View
    {
        return view('admin.auth.register');
    }

    /**
     * Function to authenticate the user,save the data of the user, and log in
     *
     * @param  RegisterUserRequest  $request
     * @return RedirectResponse
     */
    public function checkRegister(RegisterUserRequest $request): RedirectResponse
    {
        try {
            $user = User::create($request->validated());

            Auth::attempt($request->only('email', 'password'));

            $user->assignRole(Role::where('name', 'ordinary')->first());

            return redirect()->route('user.index')->withSuccess(__('you_have_successfully_registered'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Function to view login page
     *
     * @return View
     */
    public function loginView(): View
    {
        // $setting = Setting::latest('id')->first(['google', 'facebook']);
        return view('admin.auth.login');
    }

    /**
     * Function to authenticate the logged in user
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function userLogin(LoginRequest $request): RedirectResponse
    {
        try {
            if (Auth::attempt($request->validated())) {
                if (Auth::user()->hasRole(['Admin', 'admin'])) {
                    return redirect()->route('dashboard');
                } elseif (Auth::user()->hasRole(['Manager', 'manager'])) {
                    return redirect()->route('favorite.index');
                }
            } else {
                return back()->withError(__('either_the_email_or_the_password_is_incorrect'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  LogoutRequest  $request
     * @return RedirectResponse
     */
    public function logout(LogoutRequest $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
