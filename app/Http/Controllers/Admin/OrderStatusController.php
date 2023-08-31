<?php

namespace App\Http\Controllers\Admin;

use App\Actions\OrderStatus\DeleteStatusAction;
use App\Actions\OrderStatus\StoreStatusAction;
use App\Actions\OrderStatus\UpdateStatusAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatus\StoreStatusRequest;
use App\Http\Requests\OrderStatus\UpdateStatusRequest;
use App\Models\OrderStatus;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.orders.order_status');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.orders.order_status_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStatusRequest  $request
     * @param  StoreStatusAction  $action
     * @return RedirectResponse
     */
    public function store(StoreStatusRequest $request, StoreStatusAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());
            return redirect()->route('status.index')->withSuccess(__('order_status_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  OrderStatus  $status
     * @return View
     */
    public function edit(OrderStatus $status): View
    {
        return view('admin.orders.order_status_edit')->with([
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStatusRequest  $request
     * @param  UpdateStatusAction  $action
     * @param  OrderStatus  $status
     * @return RedirectResponse
     */
    public function update(UpdateStatusRequest $request, UpdateStatusAction $action, OrderStatus $status): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $status);
            return redirect()->route('status.index')->withSuccess(__('order_status_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OrderStatus  $status
     * @param  DeleteStatusAction  $action
     * @return RedirectResponse
     */
    public function destroy(OrderStatus $status, DeleteStatusAction $action): RedirectResponse
    {
        try {
            $action->execute($status);
            return redirect()->route('status.index')->withSuccess(__('order_status_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
