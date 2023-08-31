<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Coupon\DeleteCoupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\StoreCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequest;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\DiscountType;
use App\Models\Food;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.coupons.index');
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
        $discountTypes = DiscountType::all();
        $foods = Food::all();

        return view('admin.coupons.create')
            ->with([
                'restaurants' => $restaurants,
                'foods' => $foods,
                'discountTypes' => $discountTypes,
                'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCouponRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        try {
            // Create the coupon
            $coupon = Coupon::create($request->validated());

            // Add the related discountables
            $discountables = explode(', ', $request->discountables);
            foreach ($discountables as $discountable) {
                if (is_array($discountable)) {
                    $modelType = $discountable->model_type;
                    $modelId = $discountable->model_id;
                    $discount = $discountable->discount;

                    $coupon->discountables()->create([
                        'discountable_type' => $modelType,
                        'discountable_id' => $modelId,
                        'discount' => $discount,
                    ]);
                }
            }

            return redirect()->route('coupon.index')->withSuccess(__('coupon_created_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__($ex->getMessage()));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Coupon  $coupon
     * @return View
     */
    public function edit(Coupon $coupon): View
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        $discountTypes = DiscountType::all();

        return view('admin.coupons.edit')
            ->with([
                'coupon' => $coupon,
                'restaurants' => $restaurants,
                'discountTypes' => $discountTypes,
                'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCouponRequest  $request
     * @param  Coupon  $coupon
     * @return RedirectResponse
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        try {
            // Create the coupon
            $coupon->update($request->validated());

            // Add the related discountables
            $discountables = explode(', ', $request->discountables);
            foreach ($discountables as $discountable) {
                if (is_array($discountable)) {
                    $modelType = $discountable->model_type;
                    $modelId = $discountable->model_id;
                    $discount = $discountable->discount;

                    $coupon->discountables()->create([
                        'discountable_type' => $modelType,
                        'discountable_id' => $modelId,
                        'discount' => $discount,
                    ]);
                }
            }

            return redirect()->route('coupon.index')->withSuccess(__('coupon_updated_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCoupon  $action
     * @param  Coupon  $coupon
     * @return RedirectResponse
     */
    public function destroy(Coupon $coupon, DeleteCoupon $action): RedirectResponse
    {
        try {
            $action->execute($coupon);

            return redirect()->route('coupon.index')->withSuccess(__('coupon_deleted_successfully'));
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
