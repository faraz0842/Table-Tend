<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Role\DeleteRole;
use App\Actions\Role\StoreRole;
use App\Actions\Role\UpdateRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.roles.create')
            ->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $request
     * @param  StoreRole  $action
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request, StoreRole $action): RedirectResponse
    {
        try {
            $action->execute($request->all());

            return redirect()->route('role.index')->withSuccess(__('role_successfully_created'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return View
     */
    public function edit(Role $role): View
    {
        $rolePermissions = $role->permissions;
        $permissions = Permission::all();

        return view('admin.roles.edit')->with(
            [
                'role' => $role,
                'rolePermissions' => $rolePermissions,
                'permissions' => $permissions,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @param  UpdateRole  $action
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role, UpdateRole $action): RedirectResponse
    {
        try {
            $action->execute($request->all(), $role);

            return redirect()->route('role.index')->withSuccess(__('role_successfully_updated'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @param  DeleteRole  $action
     * @return RedirectResponse
     */
    public function destroy(Role $role, DeleteRole $action): RedirectResponse
    {
        try {
            $action->execute($role);

            return redirect()->route('role.index')->withSuccess(__('role_successfully_deleted'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
