<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantCategoryResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Exception;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $restaurants = Restaurant::paginate(6);

            return RestaurantResource::collection($restaurants);
        } catch (Exception $ex) {
            return response()->json(['error' => 'No Content'], 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRestaurantCategory(Restaurant $restaurant)
    {
        try {
            return new RestaurantCategoryResource($restaurant->load(['foods']));
        } catch (Exception $ex) {
            return response()->json(['error' => 'No Content'], 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRestaurantProfile(Restaurant $restaurant)
    {
        try {
            return $restaurant;
        } catch (Exception $ex) {
            return response()->json(['error' => 'No Content'], 204);
        }
    }
}
