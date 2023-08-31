<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Currency\DeleteCurrencyAction;
use App\Actions\Currency\StoreCurrencyAction;
use App\Actions\Currency\UpdateCurrencyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\StoreCurrencyRequest;
use App\Http\Requests\Currency\UpdateCurrencyRequest;
use App\Models\Currency;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCurrencyRequest  $request
     * @param  StoreCurrencyAction  $action
     * @return RedirectResponse
     */
    public function store(StoreCurrencyRequest $request, StoreCurrencyAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('currencies.index')->withSuccess(__('currency_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Currency  $currency
     * @return View
     */
    public function edit(Currency $currency): View
    {
        return view('admin.currencies.edit')->with('currency', $currency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCurrencyRequest  $request
     * @param  Currency  $currency
     * @param  UpdateCurrencyAction  $action
     * @return RedirectResponse
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency, UpdateCurrencyAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $currency);

            return redirect()->route('currencies.index')->withSuccess(__('currency_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Currency  $currency
     * @param  DeleteCurrencyAction  $action
     * @return RedirectResponse
     */
    public function destroy(Currency $currency, DeleteCurrencyAction $action): RedirectResponse
    {
        try {
            $action->execute($currency);

            return redirect()->route('currencies.index')->withSuccess(__('currency_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
