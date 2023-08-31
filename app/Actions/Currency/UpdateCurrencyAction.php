<?php

namespace App\Actions\Currency;

use App\Models\Currency;

class UpdateCurrencyAction
{
    /**
     * Update Currency along with media.
     *
     * @param array $data
     * @param Currency $currency
     * @return \App\Models\Currency
     * @throws Exception
     */
    public function execute(array $data, Currency $currency)
    {
        $currency = $currency->update($data);

        return $currency;
    }
}
