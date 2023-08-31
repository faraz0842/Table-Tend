<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->prepareData() as $currencyData) {
            // create currency
            Currency::firstOrCreate([
                'name' => $currencyData['name'],
                'symbol' => $currencyData['symbol'],
                'code' => $currencyData['code'],
                'decimal_digits' => $currencyData['decimal_digits'],
                'rounding' => $currencyData['rounding'],
            ]);
        }
    }

    /**
     * Prepare data for currencies table
     *
     * @return array
     */
    public function prepareData(): array
    {
        return [
            [
                'name' => 'US Dollar',
                'symbol' => '$',
                'code' => 'USD',
                'decimal_digits' => 2,
                'rounding' => 0,
            ],
            [
                'name' => 'Iraqi Dinar',
                'symbol' => 'د. ع',
                'code' => 'IQD',
                'decimal_digits' => 2,
                'rounding' => 0,
            ],
            // add more currencies as needed
        ];
    }
}
