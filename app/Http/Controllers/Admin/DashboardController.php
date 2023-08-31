<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the form for the specified resource.
     *
     * @return View
     */
    public function totalCount(): View
    {
        $totalRestaurants = Restaurant::count();
        $restaurants = Restaurant::first()->paginate(5);

        return view('admin.dashboard.index')->with(['restaurants' => $restaurants, 'totalRestaurants' => $totalRestaurants]);
    }
}
