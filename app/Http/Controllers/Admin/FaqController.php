<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Faq\DeleteFaqAction;
use App\Actions\Faq\StoreFaqAction;
use App\Actions\Faq\UpdateFaqAction;
use App\DataTables\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\StoreFaqRequest;
use App\Http\Requests\Faq\UpdateFaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTranslation;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  FaqDataTable  $faqDataTable
     * @return View
     */
    public function index(): View
    {
        $faqs = Faq::with('faqCategory')->withTranslation()->translatedIn(app()->getLocale())->paginate(10);
        return view('admin.faq.index')
            ->with(
                'faqs',
                $faqs
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $faqCategories = FaqCategory::all();

        return view('admin.faq.create')->with('faqCategories', $faqCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFaqRequest  $request
     * @param  StoreFaqAction  $action
     * @return RedirectResponse
     */
    public function store(StoreFaqRequest $request, StoreFaqAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('faq.index')->withSuccess(__('faq_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faq  $faq
     * @return View
     */
    public function edit(Faq $faq): View
    {
        $faqCategories = FaqCategory::all();

        return view('admin.faq.edit')->with(['faq' => $faq, 'faqCategories' => $faqCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFaqRequest  $request
     * @param  UpdateFaqAction  $action
     * @param  Faq  $faq
     * @param  FaqTranslation  $faqLocale
     * @return RedirectResponse
     */
    public function update(UpdateFaqRequest $request, UpdateFaqAction $action, Faq $faq): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $faq);

            return redirect()->route('faq.index')->withSuccess(__('faq_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Faq  $faq
     * @param  DeleteFaqAction  $action
     * @return RedirectResponse
     */
    public function destroy(Faq $faq, DeleteFaqAction $action): RedirectResponse
    {
        try {
            $action->execute($faq);

            return redirect()->route('faq.index')->withSuccess(__('faq_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
