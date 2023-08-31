<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ExtraGroup\DeleteExtraGroupAction;
use App\Actions\ExtraGroup\StoreExtraGroupAction;
use App\Actions\ExtraGroup\UpdateExtraGroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExtraGroup\StoreExtraRequest;
use App\Http\Requests\ExtraGroup\UpdateExtraRequest;
use App\Models\ExtraGroup;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExtraGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $extraGroup = ExtraGroup::paginate(10);
        return view('admin.extra_group.index')
        ->with('extraGroup', $extraGroup);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.extra_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExtraRequest  $request
     * @param  StoreExtraGroupAction  $action
     * @return RedirectResponse
     */
    public function store(StoreExtraRequest $request, StoreExtraGroupAction $action): RedirectResponse
    {
        try {
            $action->execute($request->validated());

            return redirect()->route('extra_group.index')->withSuccess(__('extra_group_stored_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ExtraGroup  $extraGroup
     * @return View
     */
    public function edit(ExtraGroup $extraGroup): View
    {
        return view('admin.extra_group.edit')->with([
            'extraGroup' => $extraGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExtraRequest  $request
     * @param  UpdateExtraGroupAction  $action
     * @param  ExtraGroup  $extraGroup
     * @return RedirectResponse
     */
    public function update(UpdateExtraRequest $request, UpdateExtraGroupAction $action, ExtraGroup $extraGroup): RedirectResponse
    {
        try {
            $action->execute($request->validated(), $extraGroup);

            return redirect()->route('extra_group.index')->withSuccess(__('extra_group_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ExtraGroup  $extraGroup
     * @param  DeleteExtraGroupAction  $action
     * @return RedirectResponse
     */
    public function destroy(ExtraGroup $extraGroup, DeleteExtraGroupAction $action): RedirectResponse
    {
        try {
            $action->execute($extraGroup);

            return redirect()->route('extra_group.index')->withSuccess(__('extra_group_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
