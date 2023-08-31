<?php

namespace App\Actions\Currency;

use App\Models\Currency;

class DeleteCurrencyAction
{
    /**
     * Delete Currency and its translations.
     *
     * @param Currency $currency
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(Currency $currency)
    {
        $isDeleted = $currency->delete();

        return $isDeleted;
    }
}
