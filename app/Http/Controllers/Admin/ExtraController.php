<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Extra\DeleteExtra;
use App\Actions\Extra\DeleteExtraAction;
use App\Actions\Extra\StoreExtraAction;
use App\Actions\Extra\UpdateExtraAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extra\StoreExtraRequest;
use App\Http\Requests\Extra\UpdateExtraRequest;
use App\Models\Extra;
use App\Models\ExtraGroup;
use App\Models\Food;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.extra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $foods = Food::all();
        $extraGroups = ExtraGroup::all();
        return view('admin.extra.create')->with(['foods' => $foods, 'extraGroups' => $extraGroups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExtraRequest  $request
     * @param  StoreExtraAction  $action
     * @return RedirectResponse
     */
    public function store(StoreExtraRequest $request, StoreExtraAction $action): RedirectResponse
    {
        try {
            $action->execute($request->all());
            return redirect()->route('extra.index')->withSuccess(__('extras_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Extra  $extra
     * @return View
     */
    public function edit(Extra $extra): View
    {
        $foods = Food::all();
        $extraGroups = ExtraGroup::all();

        return view('admin.extra.edit')->with(['foods' => $foods, 'extraGroups' => $extraGroups, 'extra' => $extra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExtraRequest  $request
     * @param  Extra  $extra
     * @param  UpdateExtraAction $action
     * @return RedirectResponse
     */
    public function update(UpdateExtraRequest $request, Extra $extra, UpdateExtraAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $extra);

            return redirect()->route('extra.index')->withSuccess(__('extras_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Extra  $extra
     * @param  DeleteExtra  $action
     * @return RedirectResponse
     */
    public function destroy(Extra $extra, DeleteExtraAction $action): RedirectResponse
    {
        try {
            $action->execute($extra);

            return redirect()->route('extra.index')->withSuccess(__('extras_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
