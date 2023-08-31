<?php

namespace App\Http\Controllers\Admin;

use App\Actions\FoodReview\DeleteFoodReviewAction;
use App\Actions\FoodReview\UpdateFoodReviewAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoodReview\UpdateFoodReviewRequest;
use App\Models\Food;
use App\Models\FoodReview;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FoodReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.food_reviews.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FoodReview  $foodReview
     * @return View
     */
    public function edit(FoodReview $foodReview): View
    {
        $users = User::all();
        $foods = Food::all();
        return view('admin.food_reviews.edit')
            ->with('foodReview', $foodReview)
            ->with('users', $users)
            ->with('foods', $foods);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFoodReviewRequest $request
     * @param  UpdateFoodReviewAction  $action
     * @param  FoodReview  $foodReview
     * @return RedirectResponse
     */
    public function update(UpdateFoodReviewRequest $request, UpdateFoodReviewAction $action, FoodReview $foodReview): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $foodReview);

            return redirect()->route('food_review.index')->withSuccess(__('food_review_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FoodReview  $foodReview
     * @param  DeleteFoodReviewAction  $action
     * @return RedirectResponse
     */
    public function destroy(FoodReview $foodReview, DeleteFoodReviewAction $action): RedirectResponse
    {
        try {
            $action->execute($foodReview);

            return redirect()->route('food_review.index')->withSuccess(__('food_review_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
