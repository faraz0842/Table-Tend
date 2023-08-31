<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Cuisine\DeleteCuisineAction;
use App\Actions\Cuisine\StoreCuisineAction;
use App\Actions\Cuisine\UpdateCuisineAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cuisines\StoreCuisinesRequest;
use App\Http\Requests\Cuisines\UpdateCuisinesRequest;
use App\Models\Cuisine;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.cuisines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCuisinesRequest  $request
     * @param  StoreCuisineAction  $action
     * @return RedirectResponse
     */
    public function store(StoreCuisinesRequest $request, StoreCuisineAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('cuisine.index')->withSuccess(__('cuisine_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cuisine  $cuisine
     * @return View
     */
    public function edit(Cuisine $cuisine): View
    {
        return view('admin.cuisines.edit')
            ->with(
                [
                    'cuisine' => $cuisine
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCuisinesRequest  $request
     * @param  UpdateCuisineAction  $action
     * @param  Cuisine  $cuisine
     * @return RedirectResponse
     */
    public function update(UpdateCuisinesRequest $request, UpdateCuisineAction $action, Cuisine $cuisine): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $cuisine);

            return redirect()->route('cuisine.index')->withSuccess(__('cuisine_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cuisine  $cuisine
     * @param  DeleteCuisineAction  $action
     * @return RedirectResponse
     */
    public function destroy(Cuisine $cuisine, DeleteCuisineAction $action): RedirectResponse
    {
        try {
            $action->execute($cuisine);

            return redirect()->route('cuisine.index')->withSuccess(__('cuisine_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
