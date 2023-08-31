<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Nutrition\DeleteNutritionAction;
use App\Actions\Nutrition\StoreNutritionAction;
use App\Actions\Nutrition\UpdateNutritionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Nutrition\StoreNutritionRequest;
use App\Http\Requests\Nutrition\UpdateNutritionRequest;
use App\Models\Food;
use App\Models\Nutrition;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.nutrition.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $foods = Food::all();

        return view('admin.nutrition.create')->with(['foods' => $foods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNutritionRequest  $request
     * @param  StoreNutritionAction  $action
     * @return RedirectResponse
     */
    public function store(StoreNutritionRequest $request, StoreNutritionAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('nutrition.index')->withSuccess(__('nutrition_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Nutrition  $nutrition
     * @return View
     */
    public function edit(Nutrition $nutrition): View
    {
        $foods = Food::all();

        return view('admin.nutrition.edit')->with(['nutrition' => $nutrition, 'foods' => $foods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNutritionRequest  $request
     * @param  UpdateNutritionAction  $action
     * @param  Nutrition  $nutrition
     * @return RedirectResponse
     */
    public function update(UpdateNutritionRequest $request, UpdateNutritionAction $action, Nutrition $nutrition): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $nutrition);

            return redirect()->route('nutrition.index')->withSuccess(__('nutrition_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Nutrition  $nutrition
     * @param  DeleteNutritionAction  $action
     * @return RedirectResponse
     */
    public function destroy(Nutrition $nutrition, DeleteNutritionAction $action): RedirectResponse
    {
        try {
            $action->execute($nutrition);

            return redirect()->route('nutrition.index')->withSuccess(__('nutrition_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
