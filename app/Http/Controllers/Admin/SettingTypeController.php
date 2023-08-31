<?php

namespace App\Http\Controllers\Admin;

use App\Actions\SettingType\DeleteSettingTypeAction;
use App\Actions\SettingType\StoreSettingTypeAction;
use App\Actions\SettingType\UpdateSettingTypeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingType\StoreSettingTypeRequest;
use App\Http\Requests\SettingType\UpdateSettingTypeRequest;
use App\Models\SettingType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SettingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.setting_type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.setting_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SettingTypeRequest  $request
     * @param  StoreSettingTypeAction  $action
     * @return RedirectResponse
     */
    public function store(StoreSettingTypeRequest $request, StoreSettingTypeAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('settingType.index')->withSuccess(__('setting_type_created_successfully'));
        } catch (Exception $ex) {
            dd($ex->getMessage());

            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SettingType  $settingType
     * @return View
     */
    public function edit(SettingType $settingType): View
    {
        return view('admin.setting_type.edit')->with('settingType', $settingType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSettingTypeRequest  $request
     * @param  SettingType  $SettingType
     * @param  UpdateSettingTypeAction  $action
     * @return RedirectResponse
     */
    public function update(UpdateSettingTypeRequest $request, SettingType $SettingType, UpdateSettingTypeAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $SettingType);

            return redirect()->route('settingType.index')->withSuccess(__('setting_type_updated_successfully'));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());

            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSettingType  $action
     * @param  SettingType  $SettingType
     * @param  DeleteSettingTypeAction  $action
     * @return RedirectResponse
     */
    public function destroy(SettingType $SettingType, DeleteSettingTypeAction $action): RedirectResponse
    {
        try {
            $action->execute($SettingType);

            return redirect()->route('settingType.index')->withSuccess(__('setting_type_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
