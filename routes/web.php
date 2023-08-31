<?php

use App\Http\Controllers\Admin\AppSliderController;
use App\Http\Controllers\Admin\AppThemeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryAddressController;
use App\Http\Controllers\Admin\DiscountTypeController;
use App\Http\Controllers\Admin\DistanceUnitController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\DriverPayoutController;
use App\Http\Controllers\Admin\EarningController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\ExtraGroupController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\FoodReviewController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GlobalSettingController;
use App\Http\Controllers\Admin\LanguageTranslationController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\MassUnitController;
use App\Http\Controllers\Admin\MobileScreenController;
use App\Http\Controllers\Admin\MobileSettingController;
use App\Http\Controllers\Admin\NutritionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\RestaurantPayoutController;
use App\Http\Controllers\Admin\RestaurantReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingTypeController;
use App\Http\Controllers\Admin\SocialiteAuthenticationController;
use App\Http\Controllers\Admin\SocialiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Middleware\Permissions;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::controller(AuthController::class)
    ->name('auth.')
    ->group(function () {
        Route::get('login', 'loginView')->name('login');
        Route::post('login-user', 'userLogin')->name('login.user');
        Route::get('register', 'registerView')->name('register');
        Route::post('check-register', 'checkRegister')->name('check.register');
        Route::get('logout', 'logout')->name('logout');
    });

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('profile/{user}', 'profile')->name('profile');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{user}', 'edit')->name('edit');
            Route::post('update/{user}', 'update')->name('update');
            Route::get('delete/{user}', 'destroy')->name('delete');
            Route::get('login/{user}', 'login')->name('login');
        });

    Route::controller(RoleController::class)
        ->prefix('role')
        ->name('role.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{role}', 'edit')->name('edit');
            Route::post('update/{role}', 'update')->name('update');
            Route::get('delete/{role}', 'destroy')->name('delete');
        });

    Route::controller(PermissionController::class)
        ->prefix('permission')
        ->name('permission.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{permission}', 'edit')->name('edit');
            Route::post('update{permission}', 'update')->name('update');
            Route::get('delete/{permission}', 'destroy')->name('delete');
            Route::get('synchronize', 'synchronize')->name('synchronize');
        });

    Route::controller(RestaurantController::class)
        ->prefix('restaurant')
        ->name('restaurant.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('list', 'requestedRestaurant')->name('list');
            Route::get('create', 'create')->name('create');
            Route::get('show', 'show')->name('show');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{restaurant:slug}', 'edit')->name('edit');
            Route::post('update/{restaurant:slug}', 'update')->name('update');
            Route::get('delete/{restaurant:slug}', 'destroy')->name('delete');
        });
    Route::controller(GalleryController::class)
        ->prefix('gallery')
        ->name('gallery.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{gallery}', 'edit')->name('edit');
            Route::post('update/{gallery}', 'update')->name('update');
            Route::get('delete/{gallery}', 'destroy')->name('delete');
        });

    Route::controller(LanguageTranslationController::class)->group(function () {
        Route::get('languages', 'index')->name('languages');
        Route::post('translations/update', 'transUpdate')->name('translation.update.json');
        Route::post('translations/updateKey', 'transUpdateKey')->name('translation.update.json.key');
        Route::get('translations/destroy/{key}', 'destroy')->name('translations.destroy');
        Route::post('translations/create', 'store')->name('translation.store');
        Route::get('add/Language', 'createLanguage')->name('addLanguage');
        Route::post('create/Language', 'addLanguage')->name('createLanguage');
        Route::get('create/config', 'newlyConfig')->name('newlyConfig');
        Route::get('/delete/{language}', 'deleteLanguage')->name('delete');
    });

    Route::controller(CuisineController::class)
        ->prefix('cuisine')
        ->name('cuisine.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{cuisine:slug}', 'edit')->name('edit');
            Route::post('update/{cuisine:slug}', 'update')->name('update');
            Route::get('delete/{cuisine:slug}', 'destroy')->name('delete');
        });

    Route::controller(FaqCategoryController::class)
        ->prefix('faq/category')
        ->name('faqCategory.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{faqCategory:slug}', 'edit')->name('edit');
            Route::post('update/{faqCategory:slug}', 'update')->name('update');
            Route::get('delete/{faqCategory:slug}', 'destroy')->name('delete');
        });

    Route::controller(FaqController::class)
        ->prefix('faq')
        ->name('faq.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{faq:slug}', 'edit')->name('edit');
            Route::post('update/{faq:slug}', 'update')->name('update');
            Route::get('delete/{faq:slug}', 'destroy')->name('delete');
        });

    Route::controller(CategoryController::class)
        ->prefix('category')
        ->name('category.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{category:slug}', 'edit')->name('edit');
            Route::post('update/{category:slug}', 'update')->name('update');
            Route::get('delete/{category:slug}', 'destroy')->name('delete');
        });

    Route::controller(FoodController::class)
        ->prefix('food')
        ->name('food.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{food:slug}', 'edit')->name('edit');
            Route::post('update/{food:slug}', 'update')->name('update');
            Route::get('delete/{food:slug}', 'destroy')->name('delete');
        });
    Route::controller(CurrencyController::class)
        ->prefix('currency')
        ->name('currencies.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{currency}', 'edit')->name('edit');
            Route::post('update/{currency}', 'update')->name('update');
            Route::get('delete/{currency}', 'destroy')->name('delete');
        });

    Route::controller(CouponController::class)
        ->prefix('coupon')
        ->name('coupon.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{coupon:slug}', 'edit')->name('edit');
            Route::post('update/{coupon:slug}', 'update')->name('update');
            Route::get('delete/{coupon:slug}', 'destroy')->name('delete');
        });

    Route::controller(DriverPayoutController::class)
        ->prefix('drivers/payout')
        ->name('drivers_payout.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('delete/{driver_payout}', 'destroy')->name('delete');
        });

    Route::controller(ExtraGroupController::class)
        ->prefix('extra/group')
        ->name('extra_group.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{extra_group:slug}', 'edit')->name('edit');
            Route::post('update/{extra_group:slug}', 'update')->name('update');
            Route::get('delete/{extra_group:slug}', 'destroy')->name('delete');
        });

    Route::controller(ExtraController::class)
        ->prefix('extra')
        ->name('extra.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{extra:slug}', 'edit')->name('edit');
            Route::post('update/{extra:slug}', 'update')->name('update');
            Route::get('delete/{extra:slug}', 'destroy')->name('delete');
        });

    Route::controller(RestaurantPayoutController::class)
        ->prefix('restaurant/payout')
        ->name('restaurant_payout.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('delete/{payout}', 'destroy')->name('delete');
        });

    Route::controller(NutritionController::class)
        ->prefix('nutrition')
        ->name('nutrition.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{nutrition:slug}', 'edit')->name('edit');
            Route::post('update/{nutrition:slug}', 'update')->name('update');
            Route::get('delete/{nutrition:slug}', 'destroy')->name('delete');
        });

    Route::controller(GlobalSettingController::class)
        ->prefix('global/setting')
        ->name('global.setting.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update/{setting}', 'update')->name('update');
            Route::get('delete/{setting}', 'destroy')->name('delete');
        });

    Route::controller(MailSettingController::class)
        ->prefix('mail')
        ->name('mail.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update{mailsetting}', 'update')->name('update');
        });

    Route::controller(SettingTypeController::class)
        ->prefix('setting/type')
        ->name('settingType.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{SettingType:slug}', 'edit')->name('edit');
            Route::post('update/{SettingType:slug}', 'update')->name('update');
            Route::get('delete/{SettingType:slug}', 'destroy')->name('delete');
        });

    Route::controller(DistanceUnitController::class)
        ->prefix('distance/unit')
        ->name('distanceUnit.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{distanceUnit:slug}', 'edit')->name('edit');
            Route::post('update/{distanceUnit:slug}', 'update')->name('update');
            Route::get('delete/{distanceUnit:slug}', 'destroy')->name('delete');
        });

    Route::controller(SocialiteAuthenticationController::class)
        ->prefix('social/authentication')
        ->name('socialite-auth.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });

    Route::controller(LocalizationController::class)
        ->prefix('localisation')
        ->name('localisation.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });

    Route::controller(DashboardController::class)
        ->group(function () {
            Route::get('', 'totalCount')->name('dashboard');
            Route::get('master');
        });

    Route::controller(MobileSettingController::class)
        ->prefix('mobile/setting')
        ->name('mobile.setting.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
        });

    Route::controller(MobileScreenController::class)
        ->prefix('mobile/screen')
        ->name('mobile.screen.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update/{mobile_screen}', 'update')->name('update');
        });

    Route::controller(AppThemeController::class)
        ->prefix('mobile/theme')
        ->name('mobile.theme.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update/{app_theme}', 'update')->name('update');
        });

    Route::controller(DriverController::class)
        ->prefix('driver')
        ->name('driver.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('edit/{user}', 'edit')->name('edit');
            Route::post('update/{driver}', 'update')->name('update');
        });

    Route::controller(AppSliderController::class)
        ->prefix('app/slider')
        ->name('slider.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{slider:slug}', 'edit')->name('edit');
            Route::post('update/{slider:slug}', 'update')->name('update');
            Route::get('delete/{slider:slug}', 'destroy')->name('delete');
        });

    Route::controller(MassUnitController::class)
        ->prefix('mass/unit')
        ->name('unit.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{unit:slug}', 'edit')->name('edit');
            Route::post('update/{unit:slug}', 'update')->name('update');
            Route::get('delete/{unit:slug}', 'destroy')->name('delete');
        });

    Route::controller(DiscountTypeController::class)
        ->prefix('discount/type')
        ->name('discount.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{discount:slug}', 'edit')->name('edit');
            Route::post('update/{discount:slug}', 'update')->name('update');
            Route::get('delete/{discount:slug}', 'destroy')->name('delete');
        });

    Route::controller(OrderStatusController::class)
        ->prefix('order/status')
        ->name('status.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{status:slug}', 'edit')->name('edit');
            Route::post('update/{status:slug}', 'update')->name('update');
            Route::get('delete/{status:slug}', 'destroy')->name('delete');
        });

    Route::controller(PaymentController::class)
        ->prefix('payments')
        ->name('payments.')
        ->group(function () {
            Route::get('', 'paymentView')->name('index');
            Route::post('store/payment', 'storePayment')->name('store.payment');
            Route::get('paypal', 'paypalView')->name('paypal');
            Route::post('store/paypal', 'storePaypal')->name('store.paypal');
            Route::get('stripe', 'stripeView')->name('stripe');
            Route::post('store/stripe', 'storeStripe')->name('store.stripe');
            Route::get('razorpay', 'razorpayView')->name('razorpay');
            Route::post('store/razorpay', 'storeRazorpay')->name('store.razorpay');
        });

    Route::controller(OrderController::class)
        ->prefix('orders')
        ->name('orders.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit', 'edit')->name('edit');
            Route::post('update/{order}', 'update')->name('update');
            Route::get('delete/{order}', 'destroy')->name('delete');
        });

    Route::controller(DeliveryAddressController::class)
        ->prefix('delivery/address')
        ->name('address.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('view', 'view')->name('view');
            Route::get('edit/{address}', 'edit')->name('edit');
            Route::post('update/{address}', 'update')->name('update');
            Route::get('delete/{address}', 'destroy')->name('delete');
        });

    Route::controller(FileManagerController::class)
        ->group(function () {
            Route::get('filemanager', 'index')->name('file.index');
            Route::get('media/create', 'create')->name('media.create');
            Route::post('filemanager/upload', 'upload')->name('media.upload');
            Route::post('file/store', 'store')->name('file.store');
            Route::get('/file/get-image/{id}', 'getImage');
            Route::post('/file/{id}', 'destroy')->name('file.destroy');
        });

    Route::controller(FoodReviewController::class)
        ->prefix('food/review')
        ->name('food_review.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('edit/{foodReview:uuid}', 'edit')->name('edit');
            Route::post('update/{foodReview:uuid}', 'update')->name('update');
            Route::get('delete/{foodReview:uuid}', 'destroy')->name('delete');
        });

    Route::controller(RestaurantReviewController::class)
        ->prefix('restaurant/review')
        ->name('restaurant_review.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('edit/{restaurantReview:uuid}', 'edit')->name('edit');
            Route::post('update/{restaurantReview:uuid}', 'update')->name('update');
            Route::get('delete/{restaurantReview:uuid}', 'destroy')->name('delete');
        });

    Route::controller(EarningController::class)
        ->prefix('earning')
        ->name('earnings.')
        ->group(function () {
            Route::get('', 'index')->name('index');
        });

    Route::controller(FavoriteController::class)
        ->prefix('favorite')
        ->name('favorite.')
        ->group(function () {
            Route::get('', 'index')->name('index');
        });

    Route::view('payouts/management', 'admin.payouts_management.index')->name('payouts_management.index');
    Route::view('role/list', 'admin.role_list.index')->name('role_list.index');
    Route::view('role/list/create', 'admin.role_list.create')->name('role_list.create');
    Route::view('permission/list', 'admin.permission_list.index')->name('permission_list.index');
    Route::view('push/notification', 'admin.push_notification.index')->name('push_notification.index');
    Route::view('transactions', 'admin.transactions.index')->name('transactions.index');
    Route::view('english/transactions', 'admin.transactions.english')->name('transactions.english');
    Route::view('esapagnol/transactions', 'admin.transactions.esapagnol')->name('transactions.esapagnol');
    Route::view('french/transactions', 'admin.transactions.french')->name('transactions.french');
    Route::view('portuguese/transactions', 'admin.transactions.portuguese')->name('transactions.portuguese');
    Route::view('order/view', 'admin.orders.view')->name('orders.view');
});

Route::withoutMiddleware(Permissions::class)->group(function () {
    Route::controller(UserAuthController::class)
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('login', 'userLoginView')->name('login.view');
            Route::get('register', 'create')->name('create.view');
            Route::post('register-user', 'registerUser')->name('register');
            Route::post('login-user', 'userLogin')->name('login');
            Route::get('logout', 'logout')->name('logout');
        });

    Route::controller(SocialiteController::class)->group(function () {
        Route::get('auth/{service}', 'redirect');
        Route::get('auth/{service}/call-back', 'callback');
    });
});
