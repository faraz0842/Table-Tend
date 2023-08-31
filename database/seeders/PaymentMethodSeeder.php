<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\PaymentMethodTranslation;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->prepareData() as $paymentMethodData) {
            // create Payment Method
            $paymentMethod = PaymentMethod::firstOrCreate([
                'slug' => $paymentMethodData['slug'],
                'color' => $paymentMethodData['color'],
                'status' => $paymentMethodData['status']
            ]);

            // create Payment Method locales
            foreach ($paymentMethodData['locales'] as $localeData) {
                PaymentMethodTranslation::firstOrCreate([
                    'payment_method_id' => $paymentMethod->id,
                    'locale' => $localeData['locale'],
                    'name' => $localeData['name'],
                ]);
            }
        }
    }

    /**
     * prepare datatable for payment method & payment method locale in multi-language
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'slug' => 'stripe',
                'color' => '#5758BB',
                'status' => 'active',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Stripe'],
                    ['locale' => 'ar', 'name' => 'شريط'],
                ],
            ],
            [
                'slug' => 'paypal',
                'color' => '#0652DD',
                'status' => 'active',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Paypal'],
                    ['locale' => 'ar', 'name' => 'باي بال'],
                ],
            ],
            [
                'slug' => 'razorpay',
                'color' => '#12CBC4',
                'status' => 'active',
                'locales' => [
                    ['locale' => 'en', 'name' => 'Razorpay'],
                    ['locale' => 'ar', 'name' => 'رازورباي'],
                ],
            ],
        ];
    }
}
