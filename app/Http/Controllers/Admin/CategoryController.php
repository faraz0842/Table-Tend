<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $images = Media::get();
        return view('admin.categories.create')
            ->with(
                [
                    'images' => $images
                ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param StoreCategoryAction $action
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request, StoreCategoryAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('category.index')->withSuccess(__('category_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        $images = Media::get();
        return view('admin.categories.edit')
            ->with([
                'images' => $images,
                'category' => $category,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @param UpdateCategoryAction $action
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $category);
            return redirect()->route('category.index')->withSuccess(__('category_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!') . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @param DeleteCategoryAction $action
     * @return RedirectResponse
     */
    public function destroy(Category $category, DeleteCategoryAction $action): RedirectResponse
    {
        try {
            if ($action->execute($category)) {
                return redirect()->route('category.index')->withSuccess(__('category_deleted_successfully'));
            } else {
                return back()->withError(__('something_went_wrong!'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
