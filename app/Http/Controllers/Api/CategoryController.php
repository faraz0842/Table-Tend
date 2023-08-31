<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryFoodResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryRestaurantResource;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return CategoryResource::collection(Category::all());
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
    public function showCategoryFood(Category $category)
    {
        try {
            return new CategoryFoodResource($category->load(['foods.nutritions']));
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
    public function showCategoryRestaurant(Category $category)
    {
        try {
            return new CategoryRestaurantResource($category->load(['foods']));
        } catch (Exception $ex) {
            return response()->json(['error' => 'No Content'], 204);
        }
    }
}
