<?php

namespace App\Actions\Currency;

use App\Models\Currency;

class StoreCurrencyAction
{
    /**
    * Store a newly created Currency in storage.
    *
    * @param  array  $data
    * @return Currency
    * @throws Exception
    */
    public function execute(array $data)
    {
        $currency = Currency::create($data);

        return $currency;
    }
}
