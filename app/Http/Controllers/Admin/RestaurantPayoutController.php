<?php

namespace App\Http\Controllers\Admin;

use App\Actions\RestaurantPayout\StorePayoutAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantPayout\StorePayoutRequest;
use App\Models\PaymentMethod;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RestaurantPayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.restaurants_payouts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $restaurant = Restaurant::all();
        $paymentMethod = PaymentMethod::all();
        return view('admin.restaurants_payouts.create')
        ->with('restaurant', $restaurant)
        ->with('paymentMethod', $paymentMethod);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRestaurantRequest  $request
     * @param  StorePayoutAction  $action
     * @return RedirectResponse
     */
    public function store(StorePayoutRequest $request, StorePayoutAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('restaurant_payout.index')->withSuccess(__('restaurant_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
