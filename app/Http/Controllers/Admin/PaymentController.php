<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Requests\Payment\StorePaypalRequest;
use App\Http\Requests\Payment\StoreRazorpayRequest;
use App\Http\Requests\Payment\StoreStripeRequest;
use App\Models\Currency;
use App\Models\Setting;
use Exception;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function paymentView(): View
    {
        $payment = Setting::pluck('value', 'key')->toArray();
        $default_currency = Currency::get();

        return view('admin.payments.payment')
        ->with('payment', $payment)
        ->with('default_currency', $default_currency);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function storePayment(StorePaymentRequest $request)
    {
        try {
            $data = [
                'key' => [
                    'default_tax' => 'app_tax',
                    'default_currency' => 'app_currency',
                    'currency_place' => 'app_currency_place',
                ],
                'value' => [
                    'default_tax' => $request->input('default_tax'),
                    'default_currency' => $request->input('default_currency'),
                    'currency_place' => $request->input('currency_place'),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function paypalView(): View
    {
        $paypal = Setting::pluck('value', 'key')->toArray();

        return view('admin.payments.paypal')
        ->with('paypal', $paypal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function storePaypal(StorePaypalRequest $request)
    {
        try {
            $data = [
                'key' => [
                    'enable_paypal' => 'app_paypal',
                    'enable_paypal_live_mode' => 'app_paypal_live_mode',
                    'paypal_username' => 'app_paypal_username',
                    'paypal_password' => 'app_paypal_password',
                    'paypal_secret' => 'app_paypal_secret',
                    'paypal_app_id' => 'app_paypal_app_id',
                ],
                'value' => [
                    'enable_paypal' => $request->input('enable_paypal'),
                    'enable_paypal_live_mode' => $request->input('enable_paypal_live_mode'),
                    'paypal_username' => $request->input('paypal_username'),
                    'paypal_password' => $request->input('paypal_password'),
                    'paypal_secret' => $request->input('paypal_secret'),
                    'paypal_app_id' => $request->input('paypal_app_id'),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function stripeView()
    {
        $stripe = Setting::pluck('value', 'key')->toArray();

        return view('admin.payments.stripe')
        ->with('stripe', $stripe);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function storeStripe(StoreStripeRequest $request)
    {
        try {
            $data = [
                'key' => [
                    'enable_stripe' => 'app_stripe',
                    'stripe_key' => 'app_stripe_key',
                    'stripe_secret' => 'app_stripe_secret',
                ],
                'value' => [
                    'enable_stripe' => $request->input('enable_stripe'),
                    'stripe_key' => $request->input('stripe_key'),
                    'stripe_secret' => $request->input('stripe_secret'),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function razorpayView(): View
    {
        $razorpay = Setting::pluck('value', 'key')->toArray();

        return view('admin.payments.razorpay')
        ->with('razorpay', $razorpay);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function storeRazorpay(StoreRazorpayRequest $request)
    {
        try {
            $data = [
                'key' => [
                    'enable_razorpay' => 'app_razorpay',
                    'razorpay_key' => 'app_razorpay_key',
                    'razorpay_secret' => 'app_razorpay_secret',
                ],
                'value' => [
                    'enable_razorpay' => $request->input('enable_razorpay'),
                    'razorpay_key' => $request->input('razorpay_key'),
                    'razorpay_secret' => $request->input('razorpay_secret'),
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
