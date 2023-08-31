<?php

namespace App\Http\Controllers\Admin;

use App\Actions\DriverPayout\StoreDriverPayoutAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverPayout\StoreDriverPayoutRequest;
use App\Models\PaymentMethod;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DriverPayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.drivers_payout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $users = User::role('Driver')->get();
        $paymentMethod = PaymentMethod::all();
        return view('admin.drivers_payout.create')->with('users', $users)->with('paymentMethod', $paymentMethod);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDriverPayoutRequest  $request
     * @param  StoreDriverPayoutAction  $action
     * @return RedirectResponse
     */
    public function store(StoreDriverPayoutRequest $request, StoreDriverPayoutAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('drivers_payout.index')->withSuccess(__('driver_payout_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
