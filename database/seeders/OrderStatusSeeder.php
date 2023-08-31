<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use App\Models\OrderStatusTranslation;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $orderStatusData) {
            // create Order Status
            $orderStatus = OrderStatus::firstOrCreate([
                'slug' => $orderStatusData['slug'],
                'color' => $orderStatusData['color']
            ]);

            // create Order Status locales
            foreach ($orderStatusData['locales'] as $localeData) {
                OrderStatusTranslation::firstOrCreate([
                    'order_status_id' => $orderStatus->id,
                    'locale' => $localeData['locale'],
                    'status' => $localeData['status'],
                ]);
            }
        }
    }

    /**
     * Prepare data for orderStatus & orderStatus_locales table
     * in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'pending',
                'color' => '#FFC312',
                'locales' => [
                    ['locale' => 'en', 'status' => 'Pending'],
                    ['locale' => 'ar', 'status' => 'قيد الانتظار'],
                ],
            ],
            [
                'slug' => 'on-the-way',
                'color' => '#0652DD',
                'locales' => [
                    ['locale' => 'en', 'status' => 'On The Way'],
                    ['locale' => 'ar', 'status' => 'علي الطريق'],
                ],
            ],
            [
                'slug' => 'delivered',
                'color' => '#009432',
                'locales' => [
                    ['locale' => 'en', 'status' => 'Delivered'],
                    ['locale' => 'ar', 'status' => 'تم التوصيل'],
                ],
            ],
            [
                'slug' => 'cancelled',
                'color' => '#EA2027',
                'locales' => [
                    ['locale' => 'en', 'status' => 'Cancelled'],
                    ['locale' => 'ar', 'status' => 'ألغيت'],
                ],
            ],
            // add more order status as needed
        ];
    }
}
