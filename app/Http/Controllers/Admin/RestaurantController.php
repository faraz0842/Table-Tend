<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Restaurant\DeleteRestaurant;
use App\Actions\Restaurant\StoreRestaurant;
use App\Actions\Restaurant\UpdateRestaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.restaurants.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function requestedRestaurant(): View
    {
        return view('admin.restaurants.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Media  $file
     * @return View
     */
    public function create(Media $file): View
    {
        $images = $file->get();
        $cuisines = Cuisine::all();
        $drivers = User::role('Driver')->get();
        $managers = User::role('Manager')->get();

        return view('admin.restaurants.create')
            ->with(
                [
                    'images' => $images,
                    'cuisines' => $cuisines,
                    'drivers' => $drivers,
                    'managers' => $managers
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRestaurantRequest  $request
     * @param  StoreRestaurant  $action
     * @return RedirectResponse
     */
    public function store(StoreRestaurantRequest $request, StoreRestaurant $action)
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('restaurant.index');
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @param  Media  $media
     * @return View
     */
    public function edit(Restaurant $restaurant, Media $media): View
    {
        $images = $media->get();
        $cuisines = Cuisine::all();
        $drivers = User::role('Driver')->get();
        $managers = User::role('Manager')->get();
        return view('admin.restaurants.edit')
            ->with(
                [
                    'restaurant' => $restaurant,
                    'images' => $images,
                    'cuisines' => $cuisines,
                    'managers' => $managers,
                    'drivers' => $drivers
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRestaurantRequest  $request
     * @param  UpdateRestaurant  $action
     * @param  Restaurant  $restaurant
     * @return RedirectResponse
     */
    public function update(UpdateRestaurantRequest $request, UpdateRestaurant $action, Restaurant $restaurant): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $restaurant);

            return redirect()->route('restaurant.index')->withSuccess(__('restaurant_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Restaurant  $restaurant
     * @param  DeleteRestaurant  $action
     * @return RedirectResponse
     */
    public function destroy(Restaurant $restaurant, DeleteRestaurant $action): RedirectResponse
    {
        try {
            $action->execute($restaurant);

            return redirect()->route('restaurant.index')->withSuccess(__('restaurant_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
