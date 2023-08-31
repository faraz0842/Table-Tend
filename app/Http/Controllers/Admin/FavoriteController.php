<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    /**
     * Get the index of the current item in the collection.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.favorites.index');
    }
}
