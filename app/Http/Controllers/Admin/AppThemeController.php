<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AppTheme\StoreThemeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppTheme\StoreThemeRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AppThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $themeSetting = Setting::pluck('value', 'key')->toArray();
        return view('admin.mobile_settings.app_theme.index')
            ->with('themeSetting', $themeSetting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreThemeRequest  $request
     * @param  StoreThemeAction $action
     * @return RedirectResponse
     */
    public function store(StoreThemeRequest $request, StoreThemeAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $request);
            return redirect()->back()->withSuccess(__('settings_have_been_updated_successfully!'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }
}
