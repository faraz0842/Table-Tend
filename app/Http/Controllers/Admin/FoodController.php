<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Food\DeleteFood;
use App\Actions\Food\DeleteFoodAction;
use App\Actions\Food\StoreFoodAction;
use App\Actions\Food\UpdateFoodAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Models\Category;
use App\Models\Food;
use App\Models\MassUnit;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.foods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        $units = MassUnit::all();

        return view('admin.foods.create')->with(['restaurants' => $restaurants, 'categories' => $categories, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFoodRequest  $request
     * @param  StoreFoodAction  $action
     * @return RedirectResponse
     */
    public function store(StoreFoodRequest $request, StoreFoodAction $action): RedirectResponse
    {
        try {
            $action->execute($request->all());

            return redirect()->route('food.index')->withSuccess('Food created successfully');
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Food  $food
     * @return View
     */
    public function edit(Food $food): View
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        $units = MassUnit::all();

        return view('admin.foods.edit')->with(['restaurants' => $restaurants, 'categories' => $categories, 'food' => $food, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFoodRequest  $request
     * @param  Food  $food
     * @param  UpdateFoodAction  $action
     * @return RedirectResponse
     */
    public function update(UpdateFoodRequest $request, Food $food, UpdateFoodAction $action): RedirectResponse
    {
        try {
            $action->execute($request->all(), $food);

            return redirect()->route('food.index')->withSuccess(__('food_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Food  $food
     * @param  DeleteFood  $action
     * @return RedirectResponse
     */
    public function destroy(Food $food, DeleteFoodAction $action): RedirectResponse
    {
        try {
            $action->execute($food);

            return back()->withSuccess(__('food_successfully_deleted'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
