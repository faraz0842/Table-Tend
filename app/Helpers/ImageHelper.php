<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * This function is used to generate fake emails
     * depends on type for example customer or driver etc
     *
     * @param  string  $type
     * @return string
     */
    public static function GetImageUrl(string $url): string
    {
        if ($url) {
            return $url;
        } else {
            return asset('assets/media/avatars/blank.png');
        }
    }
}
