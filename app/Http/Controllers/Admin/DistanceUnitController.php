<?php

namespace App\Http\Controllers\Admin;

use App\Actions\DistanceUnit\DeleteDistanceUnit;
use App\Actions\DistanceUnit\StoreDistanceUnit;
use App\Actions\DistanceUnit\UpdateDistanceUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistanceUnit\StoreDistanceUnitRequest;
use App\Http\Requests\DistanceUnit\UpdateDistanceUnitRequest;
use App\Models\DistanceUnit;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DistanceUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  CategoryDataTable  $categoryDataTable
     * @return View
     */
    public function index(): View
    {
        return view('admin.distanceunit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.distanceunit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDistanceUnitRequest  $request
     * @param  StoreCategory  $action
     * @return RedirectResponse
     */
    public function store(StoreDistanceUnitRequest $request, StoreDistanceUnit $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());
            return redirect()->route('distanceUnit.index')->withSuccess(__('distance_unit_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return View
     */
    public function edit(DistanceUnit $distanceUnit): View
    {
        return view('admin.distanceunit.edit')
            ->with([
                'distanceUnit' => $distanceUnit,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDistanceUnitRequest  $request
     * @param  DistanceUnit  $distanceUnit
     * @param  UpdateDistanceUnit  $action
     * @return RedirectResponse
     */
    public function update(UpdateDistanceUnitRequest $request, DistanceUnit $distanceUnit, UpdateDistanceUnit $action)
    {
        try {
            $action->execute($request->validated(), $distanceUnit);
            return redirect()->route('distanceUnit.index')->withSuccess(__('distance_unit_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DistanceUnit  $distanceUnit
     * @param  DeleteDistanceUnit  $action
     * @return RedirectResponse
     */
    public function destroy(DistanceUnit $distanceUnit, DeleteDistanceUnit $action): RedirectResponse
    {
        try {
            $action->execute($distanceUnit);

            return redirect()->route('distanceUnit.index')->withSuccess(__('distance_unit_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
