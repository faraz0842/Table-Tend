<?php

namespace App\Http\Controllers\Admin;

use App\Actions\MassUnit\DeleteUnit;
use App\Actions\MassUnit\StoreUnit;
use App\Actions\MassUnit\UpdateUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassUnit\StoreUnitRequest;
use App\Http\Requests\MassUnit\UpdateUnitRequest;
use App\Models\MassUnit;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MassUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.mass_unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.mass_unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUnitRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreUnitRequest $request, StoreUnit $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());
            return redirect()->route('unit.index')->withSuccess(__('unit_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Show the form for editing a new resource.
     *
     * @return View
     */
    public function edit(MassUnit $unit): View
    {
        return view('admin.mass_unit.edit')
            ->with(
                [
                    'unit' => $unit
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUnitRequest  $request
     * @param  MassUnit  $unit
     * @param  UpdateUnit  $action
     * @return RedirectResponse
     */
    public function update(UpdateUnitRequest $request, MassUnit $unit, UpdateUnit $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $unit);
            return redirect()->route('unit.index')->withSuccess(__('unit_updated_successfully'));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MassUnit  $unit
     * @param  DeleteUnit  $action
     * @return RedirectResponse
     */
    public function destroy(MassUnit $unit, DeleteUnit $action): RedirectResponse
    {
        try {
            $action->execute($unit);

            return redirect()->route('unit.index')->withSuccess(__('unit_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
