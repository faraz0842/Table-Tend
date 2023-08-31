<?php

namespace App\Actions\AppSlider;

use App\Models\AppSlider;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateSliderAction
{
    /**
     * Update an existing slider.
     *
     * @param array $data The data to update the slider
     * @param AppSlider $slider The slider to update
     *
     * @return AppSlider The updated slider
     * @throws Exception
     */
    public function execute(array $data, AppSlider $slider): AppSlider
    {
        DB::beginTransaction();

        try {
            $slider->update($data);

            if (array_key_exists('image', $data)) {
                $slider->media()->delete();
                $slider->addMedia($data['image'])->toMediaCollection('slider.images');
            }

            // Commit the transaction
            DB::commit();

            return $slider;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
