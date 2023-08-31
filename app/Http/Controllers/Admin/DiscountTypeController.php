<?php

namespace App\Http\Controllers\Admin;

use App\Actions\DiscountType\DeleteDiscountTypeAction;
use App\Actions\DiscountType\StoreDiscountTypeAction;
use App\Actions\DiscountType\UpdateDiscountTypeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountType\StoreTypeRequest;
use App\Http\Requests\DiscountType\UpdateTypeRequest;
use App\Models\DiscountType;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiscountTypeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.discount_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.discount_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTypeRequest  $request
     * @param  StoreDiscountTypeAction $action
     * @return RedirectResponse
     */
    public function store(StoreTypeRequest $request, StoreDiscountTypeAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('discount.index')->withSuccess(__('discount_type_created_successfully'));
        } catch (Exception $ex) {
            dd($ex->getMessage());

            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing an existing resource.
     * @param  DiscountType $discount
     * @return View
     */
    public function edit(DiscountType $discount): View
    {
        return view('admin.discount_types.edit')->with('discount', $discount);
    }

    /**
     * update a edited resource in storage.
     *
     * @param  UpdateTypeRequest  $request
     * @param  UpdateDiscountTypeAction $action
     * @param  DiscountType $discount
     * @return RedirectResponse
     */
    public function update(UpdateTypeRequest $request, UpdateDiscountTypeAction $action, DiscountType $discount): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $discount);

            return redirect()->route('discount.index')->withSuccess(__('discount_type_updated_successfully'));
        } catch (Exception $ex) {
            dd($ex->getMessage());

            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDiscountTypeAction  $action
     * @param  DiscountType  $discount
     * @return RedirectResponse
     */
    public function destroy(DiscountType $discount, DeleteDiscountTypeAction $action): RedirectResponse
    {
        try {
            $action->execute($discount);

            return redirect()->route('discount.index')->withSuccess(__('discount_type_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
