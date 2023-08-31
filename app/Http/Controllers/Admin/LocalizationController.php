<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Localisation\StoreLocalisationRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.localisation.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLocalisationRequest  $request
     * @param  string  $attr
     * @return RedirectResponse
     */
    public function store(StoreLocalisationRequest $request, $attr = ['locale', 'date_format', 'timezone']): RedirectResponse
    {
        try {
            foreach ($attr as $att) {
                $key = $att;
                $value = $request->input($att);
                session(['appLang' => $request->locale]);
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }

            return back()->withSuccess(__('localisation_stored_successfully'));
        } catch (Exception $e) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
