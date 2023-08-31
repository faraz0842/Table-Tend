<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Gallery\DeleteGalleryAction;
use App\Actions\Gallery\StoreGalleryAction;
use App\Actions\Gallery\UpdateGalleryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return View
     */
    public function index(): View
    {
        return view('admin.restaurants.galleries.index');
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
        $restaurants = Restaurant::all();

        return view('admin.restaurants.galleries.create')->with(['restaurants' => $restaurants, 'images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGalleryRequest  $request
     * @param  StoreGalleryAction  $action
     * @return RedirectResponse
     */
    public function store(StoreGalleryRequest $request, StoreGalleryAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('gallery.index')->withSuccess(__('gallery_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Gallery  $gallery
     * @param  Media  $media
     * @return View
     */
    public function edit(Gallery $gallery, Media $media): View
    {
        $images = $media->get();
        $restaurants = Restaurant::all();

        return view('admin.restaurants.galleries.edit')->with(['gallery' => $gallery, 'images' => $images, 'restaurants' => $restaurants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGalleryRequest  $request
     * @param  UpdateGalleryAction  $action
     * @param  Gallery  $gallery
     * @return RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, UpdateGalleryAction $action, Gallery $gallery): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $gallery);

            return redirect()->route('gallery.index')->withSuccess(__('gallery_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Gallery  $gallery
     * @param  DeleteGalleryAction  $action
     * @return RedirectResponse
     */
    public function destroy(Gallery $gallery, DeleteGalleryAction $action): RedirectResponse
    {
        try {
            $action->execute($gallery);

            return redirect()->route('gallery.index')->withSuccess(__('gallery_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
