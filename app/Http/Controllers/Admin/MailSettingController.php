<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\StoreMailRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MailSettingController extends Controller
{
    /**
     * store the specified resource in storage.
     *
     * @return View
     */
    public function index(): View
    {
        $mail = Setting::pluck('value', 'key')->toArray();
        return view('admin.mail.index')
        ->with('mail', $mail);
    }

    /**
     * store the specified resource in storage.
     *
     * @param  StoreMailRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreMailRequest $request): RedirectResponse
    {
        try {
            $data = [
                'key' => [
                    'mail_host' => 'app_mail_host',
                    'mail_username' => 'app_mail_username',
                    'mail_port' => 'app_mail_port',
                    'mail_password' => 'app_mail_password',
                    'mail_encryption' => 'app_mail_encryption',
                    'sender_email' => 'app_sender_email',
                    'sender_name' => 'app_sender_name',
                ],
                'value' => [
                    'mail_host' => $request->input('mail_host'),
                    'mail_username' => $request->input('mail_username'),
                    'mail_port' => $request->input('mail_port'),
                    'mail_password' => $request->input('mail_password'),
                    'mail_encryption' => $request->input('mail_encryption'),
                    'sender_email' => $request->input('sender_email'),
                    'sender_name' => $request->input('sender_name'),
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

            return redirect()->back()->withSuccess(__('mail_have_been_updated_successfully!'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }
}
