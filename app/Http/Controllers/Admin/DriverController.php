<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Driver\UpdateDriver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.drivers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Driver  $driver
     * @param  User  $user
     * @return View
     */
    public function edit(User $user, Driver $driver): View
    {
        $driver = Driver::find($user->id);

        return view('admin.drivers.edit')->with(['user' => $user, 'driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDriverRequest  $request
     * @param  Driver  $driver
     * @param  UpdateDriver  $action
     * @return RedirectResponse
     */
    public function update(UpdateDriverRequest $request, Driver $driver, UpdateDriver $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $driver);

            return redirect()->route('driver.index')->withSuccess(__('driver_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
