<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            CuisineSeeder::class,
            ContactUsSeeder::class,
            DiscountTypeSeeder::class,
            DriverSeeder::class,
            SettingTypeSeeder::class,
            CustomerSeeder::class,
            ManagerSeeder::class,
            DeliveryAddressSeeder::class,
            CurrencySeeder::class,
            FaqCategorySeeder::class,
            FaqSeeder::class,
            ExtraGroupSeeder::class,
            RestaurantSeeder::class,
            UserRestaurantSeeder::class,
            RestaurantCuisineSeeder::class,
            RestaurantReviewSeeder::class,
            MassUnitSeeder::class,
            FoodSeeder::class,
            FoodReviewsSeeder::class,
            ExtrasSeeder::class,
            NutritionSeeder::class,
            OrderStatusSeeder::class,
            PaymentStatusSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
