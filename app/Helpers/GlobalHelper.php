<?php

namespace App\Helpers;

class GlobalHelper
{
    /**
     * This function is used to generate fake emails
     * depends on type for example customer or driver etc
     *
     * @param  string  $type
     * @return string
     */
    public static function generateFakeEmail(string $type): string
    {
        return strtolower(fake()->firstName).'_'.$type.'@'.config('app.domain');
    }
}
