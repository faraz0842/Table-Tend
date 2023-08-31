<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppSliderSettingResource;
use App\Models\AppSlider;
use Exception;

class AppSliderSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return AppSliderSettingResource::collection(AppSlider::all());
        } catch (Exception $ex) {
            return response()->json(['error' => 'No Content'], 206);
        }
    }
}
