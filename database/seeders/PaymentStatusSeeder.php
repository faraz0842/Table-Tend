<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use App\Models\PaymentStatusTranslation;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->prepareData() as $paymentStatusData) {
            // create Payment Status
            $paymentStatus = PaymentStatus::firstOrCreate([
                'slug' => $paymentStatusData['slug'],
                'color' => $paymentStatusData['color']
            ]);

            // create Payment Status locales
            foreach ($paymentStatusData['locales'] as $localeData) {
                PaymentStatusTranslation::firstOrCreate([
                    'payment_status_id' => $paymentStatus->id,
                    'locale' => $localeData['locale'],
                    'status' => $localeData['status'],
                ]);
            }
        }
    }

    /**
     * prepare datatable for payment status & payment status locale in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'paid',
                'color' => '#009432',
                'locales' => [
                    ['locale' => 'en', 'status' => 'Paid'],
                    ['locale' => 'ar', 'status' => 'مدفوع'],
                ],
            ],
            [
                'slug' => 'un-paid',
                'color' => '#EA2027',
                'locales' => [
                    ['locale' => 'en', 'status' => 'Un Paid'],
                    ['locale' => 'ar', 'status' => 'تلك الأشجار'],
                ],
            ],
        ];
    }
}
