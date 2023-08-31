<?php

use App\Http\Controllers\Api\AppScreenSettingController;
use App\Http\Controllers\Api\AppSettingController;
use App\Http\Controllers\Api\AppSliderSettingController;
use App\Http\Controllers\Api\AppThemeSettingController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->middleware('auth:sanctum');
    });

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('categories', 'index');
        Route::get('category/food/{category}', 'showCategoryFood');
        Route::get('category/restaurant/{category}', 'showCategoryRestaurant');
    });

Route::controller(RestaurantController::class)
    ->group(function () {
        Route::get('restaurants', 'index');
        Route::get('restaurant/category/{restaurant}', 'showRestaurantCategory');
        Route::get('restaurant/profile/{restaurant}', 'showRestaurantProfile');
    });

Route::controller(ReviewController::class)
    ->group(function () {
        Route::get('reviews', 'index');
        Route::post('review/store', 'store')->middleware('auth:sanctum');
    });

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(OrderController::class)
        ->prefix('order')
        ->group(function () {
            Route::post('create', 'create');
        });
});

Route::controller(AppSettingController::class)
    ->prefix('mobile/setting')
    ->name('mobile.setting.')
    ->group(function () {
        Route::get('index', 'index')->name('index');
    });

Route::controller(AppScreenSettingController::class)
    ->prefix('mobile/screen/setting')
    ->name('mobile.screen.setting.')
    ->group(function () {
        Route::get('index', 'index')->name('index');
    });

Route::controller(AppThemeSettingController::class)
    ->prefix('mobile/theme/setting')
    ->name('mobile.theme.setting.')
    ->group(function () {
        Route::get('index', 'index')->name('index');
    });

Route::controller(AppSliderSettingController::class)
    ->prefix('mobile/slider/setting')
    ->name('mobile.slider.setting.')
    ->group(function () {
        Route::get('index', 'index')->name('index');
    });
