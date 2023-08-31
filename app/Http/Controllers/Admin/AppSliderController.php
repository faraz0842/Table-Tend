<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AppSlider\DeleteSliderAction;
use App\Actions\AppSlider\StoreSliderAction;
use App\Actions\AppSlider\UpdateSliderAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSlider\StoreSliderRequest;
use App\Http\Requests\AppSlider\UpdateSliderRequest;
use App\Models\AppSlider;
use App\Models\Food;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AppSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.mobile_settings.app_slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Media  $media
     * @return view
     */
    public function create(Media $media): View
    {
        $images = $media->get();
        $foods = Food::all();
        $restaurants = Restaurant::all();

        return view('admin.mobile_settings.app_slider.create')->with(['foods' => $foods, 'restaurants' => $restaurants, 'images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSliderRequest  $request
     * @param  StoreSliderAction  $action
     * @return RedirectResponse
     */
    public function store(StoreSliderRequest $request, StoreSliderAction $action): RedirectResponse
    {
        try {
            $action->execute($request->all());

            return redirect()->route('slider.index')->withSuccess(__('slider_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppSlider  $slider
     * @param  Media  $media
     * @return View
     */
    public function edit(AppSlider $slider, Media $media): View
    {
        $images = $media->get();
        $foods = Food::all();
        $restaurants = Restaurant::all();

        return view('admin.mobile_settings.app_slider.edit')
            ->with(
                [
                    'foods' => $foods,
                    'restaurants' => $restaurants,
                    'slider' => $slider,
                    'images' => $images
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSliderRequest  $request
     * @param  UpdateSliderAction  $action
     * @param  AppSlider  $slider
     * @return RedirectResponse
     */
    public function update(UpdateSliderRequest $request, UpdateSliderAction $action, AppSlider $slider): RedirectResponse
    {
        try {
            $slider = $action->execute($request->validated(), $slider);

            return redirect()->route('slider.index')->withSuccess(__('slider_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AppSlider  $slider
     * @param  DeleteSliderAction  $action
     * @return RedirectResponse
     */
    public function destroy(AppSlider $slider, DeleteSliderAction $action): RedirectResponse
    {
        try {
            $action->execute($slider);

            return redirect()->route('slider.index')->withSuccess(__('slider_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
