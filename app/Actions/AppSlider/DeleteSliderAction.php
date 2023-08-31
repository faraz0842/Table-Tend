<?php

namespace App\Actions\AppSlider;

use App\Models\AppSlider;

class DeleteSliderAction
{
    /**
     * Delete a slider.
     *
     * @param AppSlider $slider The slider to delete
     *
     * @return bool Whether the slider was successfully deleted or not
     */
    public function execute(AppSlider $slider): bool
    {
        $slider->media()->delete();
        $slider->deleteTranslations();
        $isDelete = $slider->delete();

        return $isDelete;
    }
}
