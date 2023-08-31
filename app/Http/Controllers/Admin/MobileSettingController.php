<?php

namespace App\Http\Controllers\Admin;

use App\Actions\MobileSetting\StoreGlobalSettingAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\MobileSetting\StoreSettingRequest;
use App\Models\DistanceUnit;
use App\Models\Language;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MobileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $mobileSetting = Setting::pluck('value', 'key')->toArray();
        $distanceUnit = DistanceUnit::all();
        $language = Language::all();
        return view('admin.mobile_settings.global_settings.index')
            ->with(
                [
                    'distanceUnit' => $distanceUnit,
                    'mobileSetting' => $mobileSetting,
                    'language' => $language
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSettingRequest  $request
     * @param  StoreGlobalSettingAction $action
     * @return RedirectResponse
     */
    public function store(StoreSettingRequest $request, StoreGlobalSettingAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $request);
            return redirect()->back()->withSuccess(__('settings_have_been_updated_successfully!'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }
}
