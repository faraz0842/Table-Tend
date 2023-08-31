<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class LanguageHelper
{
    /**
     * This function is used to fetch those languages
     * which is not exist in database
     *
     * @param  Model  $model
     * @return array
     */
    public static function getLanguagesNotExist(Model $model): array
    {
        $available_languages = config('languages');
        $languages_exist = $model->locale->pluck('locale')->toArray();

        return array_merge(array_diff($languages_exist, array_keys($available_languages)), array_diff(array_keys($available_languages), $languages_exist));
    }
}
