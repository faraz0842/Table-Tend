<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Socialite\StoreSocialiteRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SocialiteAuthenticationController extends Controller
{
    /**
     * Display the specified resource from storage.
     *
     * @return View
     */
    public function index(): View
    {
        $social_setting = Setting::pluck('value', 'key')->toArray();

        return view('admin.social_authentication.index')
        ->with('social_setting', $social_setting);
    }

    /**
     * Config the specified resource from storage.
     *
     * @param  StoreSocialiteRequest  $request
     * @param  string  $providers
     * @param  string  $attr
     * @return RedirectResponse
     */
    public function store(StoreSocialiteRequest $request): RedirectResponse
    {
        try {
            $data = [
                'key' => [
                    'facebook_application_id' => 'app_facebook_id',
                    'facebook_application_secret' => 'app_facebook_secret',
                    'facebook' => 'app_facebook_check',
                    'google_application_id' => 'app_google_id',
                    'google_application_secret' => 'app_google_secret',
                    'google' => 'app_google_check',
                ],
                'value' => [
                    'facebook_application_id' => $request->input('facebook_application_id'),
                    'facebook_application_secret' => $request->input('facebook_application_secret'),
                    'facebook' => $request->input('facebook'),
                    'google_application_id' => $request->input('google_application_id'),
                    'google_application_secret' => $request->input('google_application_secret'),
                    'google' => $request->input('google'),
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

            return redirect()->back()->with('success', 'Settings have been updated successfully!');
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
