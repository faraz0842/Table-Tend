<?php

return [
    /**
     * This will set driver seeder limit
     */
    'driver_seeder_limit' => env('DRIVER_SEEDER_LIMIT', 10),

    /**
     * This will set customer seeder limit
     */
    'customer_seeder_limit' => env('CUSTOMER_SEEDER_LIMIT', 10),

    /**
     * This will set manager seeder limit
     */
    'manager_seeder_limit' => env('MANAGER_SEEDER_LIMIT', 10),

    /**
     * This will set delivery addresses seeder limit
     */
    'delivery_address_seeder_limit' => env('DELIVERY_ADDRESS_SEEDER_LIMIT', 10),

    /**
     * This will set restaurant seeder limit
     */
    'restaurant_seeder_limit' => env('RESTAURANT_SEEDER_LIMIT', 15),

    /**
     * This will set food seeder limit
     */
    'food_seeder_limit' => env('FOOD_SEEDER_LIMIT', 10),
];
