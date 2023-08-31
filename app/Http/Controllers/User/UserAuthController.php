<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserAuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $setting = Setting::latest('id')->first(['google', 'facebook']);

        return view('frontend.auth.register')->with('settings', $setting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterUserRequest  $request
     * @return RedirectResponse
     */
    public function registerUser(RegisterUserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            Auth::attempt($request->only('email', 'password'));

            $user->assignRole(Role::where('name', 'ordinary')->first());

            if ($user) {
                return redirect()->route('user.login.view');
            } else {
                return back()->withError('Something Went Wrong');
            }
        } catch (Exception $ex) {
            return back()->withError('Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Setting  $stting
     * @return View
     */
    public function userLoginView(Setting $setting): View
    {
        $setting = Setting::latest('id')->first(['google', 'facebook']);

        return view('frontend.auth.login')->with('settings', $setting);
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
                if (Auth::user()->hasRole('ordinary')) {
                    return redirect()->route('home');
                } else {
                    return back()->withError('Something went wrong!');
                }
            } else {
                return back()->withError('Either the email or the password is incorrect');
            }
        } catch (Exception $ex) {
            return back()->withError('Something went wrong!');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.login.view');
    }
}
