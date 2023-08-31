<?php

namespace App\Http\Controllers\Admin;

use App\Actions\RestaurantReview\DeleteRestaurantReviewAction;
use App\Actions\RestaurantReview\UpdateRestaurantReviewAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantReview\UpdateRestaurantReviewRequest;
use App\Models\Restaurant;
use App\Models\RestaurantReview;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RestaurantReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.restaurants.review.index');
    }

    /**
     * Returns the view for editing a restaurant review.
     *
     * @return \Illuminate\View\View
     */
    public function edit(RestaurantReview $restaurantReview): View
    {
        $users = User::all();
        $restaurants = Restaurant::all();
        return view('admin.restaurants.review.edit')->with(['users' => $users, 'restaurants' => $restaurants, 'restaurantReview' => $restaurantReview]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRestaurantReviewRequest $request
     * @param  UpdateRestaurantReviewAction  $action
     * @param  RestaurantReview  $restaurantReview
     * @return RedirectResponse
     */
    public function update(UpdateRestaurantReviewRequest $request, UpdateRestaurantReviewAction $action, RestaurantReview $restaurantReview): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $restaurantReview);

            return redirect()->route('restaurant_review.index')->withSuccess(__('restaurant_review_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  restaurantReview  $restaurantReview
     * @param  DeleteRestaurantReviewAction  $action
     * @return RedirectResponse
     */
    public function destroy(RestaurantReview $restaurantReview, DeleteRestaurantReviewAction $action): RedirectResponse
    {
        try {
            $action->execute($restaurantReview);

            return redirect()->route('restaurant_review.index')->withSuccess(__('restaurant_review_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }
}
