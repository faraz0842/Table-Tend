<?php

namespace App\Http\Controllers\Admin;

use App\Actions\FaqCategory\DeleteFaqCategoryAction;
use App\Actions\FaqCategory\StoreFaqCategoryAction;
use App\Actions\FaqCategory\UpdateFaqCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategory\StoreFaqCategoryRequest;
use App\Http\Requests\FaqCategory\UpdateFaqCategoryRequest;
use App\Models\FaqCategory;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $faqCategories = FaqCategory::withTranslation()->translatedIn(app()->getLocale())->paginate(10);

        return view('admin.faq_category.index')->with('faqCategories', $faqCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.faq_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFaqCategoryRequest  $request
     * @param  StoreFaqCategoryAction  $action
     * @return RedirectResponse
     */
    public function store(StoreFaqCategoryRequest $request, StoreFaqCategoryAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('faqCategory.index')->withSuccess(__('faq_category_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FaqCategory  $category
     * @return View
     */
    public function edit(FaqCategory $faqCategory): View
    {
        return view('admin.faq_category.edit')->with('faqCategory', $faqCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFaqCategoryRequest  $request
     * @param  UpdateFaqCategoryAction  $action
     * @param  FaqCategory  $faqCategory
     * @return RedirectResponse
     */
    public function update(UpdateFaqCategoryRequest $request, UpdateFaqCategoryAction $action, FaqCategory $faqCategory): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $faqCategory);

            return redirect()->route('faq_category.index')->withSuccess(__('faq_category_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FaqCategory  $faqCategory
     * @param  DeleteFaqCategoryAction  $action
     * @return RedirectResponse
     */
    public function destroy(FaqCategory $faqCategory, DeleteFaqCategoryAction $action): RedirectResponse
    {
        try {
            $action->execute($faqCategory);

            return redirect()->route('faq_category.index')->withSuccess(__('faq_category_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
