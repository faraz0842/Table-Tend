<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('admin.earnings.index');
    }
}
