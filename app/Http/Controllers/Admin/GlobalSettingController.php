<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalSetting\StoreSettingRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GlobalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $globalSetting = Setting::where('key', 'app_logo', 'app_image')->first();
        $global_setting = Setting::pluck('value', 'key')->toArray();

        return view('admin.global_settings.index')
            ->with([
                'global_setting' => $global_setting,
                'globalSetting' => $globalSetting,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSettingRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreSettingRequest $request): RedirectResponse
    {
        try {
            $data = [
                'key' => [
                    'application_name' => 'app_name',
                    'short_description' => 'app_desc',
                    'facebook_link' => 'app_facebook',
                    'insta_link' => 'app_instagram',
                    'google_link' => 'app_google',
                    'twitter_link' => 'app_twitter',
                    'email' => 'app_email',
                    'fixed_header' => 'app_header',
                    'fixed_footer' => 'app_footer',
                    'image' => 'app_image',
                    'application_logo' => 'app_logo',
                ],
                'value' => [
                    'application_name' => $request->input('application_name'),
                    'short_description' => $request->input('short_description'),
                    'facebook_link' => $request->input('facebook_link'),
                    'insta_link' => $request->input('insta_link'),
                    'google_link' => $request->input('google_link'),
                    'twitter_link' => $request->input('twitter_link'),
                    'email' => $request->input('email'),
                    'fixed_header' => $request->input('fixed_header'),
                    'fixed_footer' => $request->input('fixed_footer'),
                    'image' => $request->file('image'),
                    'application_logo' => $request->file('application_logo'),
                ],
                'setting_type_id' => 1,
            ];

            foreach ($data['key'] as $field => $key) {
                $tableData = Setting::where('key', $key)->get();
                if ($tableData->isEmpty()) {
                    Setting::create([
                        'key' => $key,
                        'value' => $data['value'][$field],
                        'setting_type_id' => $data['setting_type_id'],
                    ]);
                } else {
                    $setting = $tableData->first();
                    $setting->update([
                        'value' => $data['value'][$field],
                        'setting_type_id' => $data['setting_type_id'],
                    ]);
                }
            }
            if (isset($request['image'])) {
                if ($setting->getFirstMedia('setting.images')) {
                    $setting->clearMediaCollection('setting.images');
                }
                $setting->addMedia($request['image'])->toMediaCollection('setting.images');
            }
            if (isset($request['application_logo'])) {
                if ($setting->getFirstMedia('application.logo.images')) {
                    $setting->clearMediaCollection('application.logo.images');
                }
                $setting->addMedia($request['application_logo'])->toMediaCollection('application.logo.images');
            }

            return redirect()->back()->withSuccess(__('settings_have_been_updated_successfully!'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }
}
