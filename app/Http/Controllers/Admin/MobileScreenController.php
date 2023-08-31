<?php

namespace App\Http\Controllers\Admin;

use App\Actions\MobileScreenSetting\StoreSetting;
use App\Actions\MobileScreenSetting\UpdateSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\MobileScreenSetting\StoreScreenSetting;
use App\Http\Requests\MobileScreenSetting\UpdateScreenSetting;
use App\Models\MobileScreenSetting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MobileScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.mobile_settings.screen_settings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreScreenSetting  $request
     * @param  StoreSetting  $action
     * @return RedirectResponse
     */
    public function store(StoreScreenSetting $request, StoreSetting $action): RedirectResponse
    {
        try {
            $action->execute($request->all());

            return redirect()->back()->withSuccess(__('setting_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateScreenSetting  $request
     * @param  UpdateSetting  $action
     * @param  MobileScreenSetting  $mobileScreen
     * @return RedirectResponse
     */
    public function update(UpdateScreenSetting $request, UpdateSetting $action, MobileScreenSetting $mobileScreen): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $mobileScreen);

            return redirect()->back()->withSuccess(__('setting_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
