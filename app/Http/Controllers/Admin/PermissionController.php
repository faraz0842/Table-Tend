<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PermissionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  PermissionDataTable  $permissionDataTable
     * @return View
     */
    public function index(): View
    {
        return view('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest  $request
     * @return RedirectResponse
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        try {
            $permission = Permission::create($request->validated());
            if ($permission) {
                return redirect()->route('permission.index')->withSuccess(__('permission_successfully_created'));
            } else {
                return back()->withError(__('something_went_wrong!'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $permission
     * @return View
     */
    public function edit(Permission $permission): View
    {
        return view('admin.permissions.edit')
            ->with(
                'permission',
                $permission
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePermissionRequest  $request
     * @param  Permission  $permission
     * @return RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        try {
            $permission->update($request->validated());

            if ($permission) {
                return redirect()->route('permission.index')->withSuccess(__('permission_successfully_updated'));
            } else {
                return back()->withError(__('something_went_wrong!'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        try {
            $permission->delete();

            return redirect()->route('permission.index')->withSuccess(__('permission_successfully_deleted'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Get all the permissions newly created routes
     *
     * @return RedirectResponse
     */
    public function synchronize(): RedirectResponse
    {
        try {
            $latest_permissions = array_keys(Route::getRoutes()->getRoutesByName());
            $stored_permissions = Permission::all()->pluck('name')->toArray();
            $new_permissions = array_diff($latest_permissions, $stored_permissions);
            $old_permissions = array_diff($stored_permissions, $latest_permissions);
            foreach ($new_permissions as $new_permission) {
                Permission::create(['name' => $new_permission, 'guard_name' => 'web']);
            }
            Permission::whereIn('name', $old_permissions)->delete();

            return redirect()->route('permission.index')->withSuccess(__('permissions_successfully_synchronized'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
