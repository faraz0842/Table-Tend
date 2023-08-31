<?php

namespace App\Http\Controllers\Admin;

use App\Actions\User\DeleteUser;
use App\Actions\User\StoreUser;
use App\Actions\User\UpdateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Driver;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $roles = Role::all();

        return view('admin.users.create')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  User  $user
     * @return View
     */
    public function profile(User $user): View
    {
        $roles = Role::all();
        $userRole = $user->getRoleNames()->first();
        return view('admin.users.show')
            ->with(['user' => $user, 'roles' => $roles, 'userRole' => $userRole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @param  StoreUser  $action
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request, StoreUser $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('user.index')->withSuccess('User created successfully');
        } catch (Exception $ex) {
            return redirect()->route('user.create')->withError($ex->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user)
    {
        $userRole = $user->getRoleNames()->first();
        $roles = Role::all();

        return view('admin.users.edit')
            ->with(
                ['user' => $user, 'roles' => $roles, 'userRole' => $userRole]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @param  UpdateUser  $action
     * @param  Driver  $driver
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user, UpdateUser $action, Driver $driver): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $user, $driver);

            return redirect()->route('user.index')->withSuccess(__('user_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @param  DeleteUser  $action
     * @return RedirectResponse
     */
    public function destroy(User $user, DeleteUser $action): RedirectResponse
    {
        try {
            $action->execute($user);

            return redirect()->back()->withSuccess(__('user_successfully_deleted'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function login(User $user, Request $request): RedirectResponse
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            Auth::login($user);

            return redirect()->back()->withSuccess(__('user_successfully_logged_in'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
