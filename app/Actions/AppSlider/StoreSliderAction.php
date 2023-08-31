<?php

namespace App\Actions\AppSlider;

use App\Models\AppSlider;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreSliderAction
{
    /**
     * Store a new slider.
     *
     * @param array $data The data to create the slider
     *
     * @return AppSlider The newly created slider
     * @throws Exception
     */
    public function execute(array $data): AppSlider
    {
        DB::beginTransaction();

        try {
            $slider = AppSlider::create($data);
            if (isset($data['image'])) {
                $slider->addMedia($data['image'])->toMediaCollection('slider.images');
            }

            if (isset($data['image_path'])) {
                $slider->addMedia(($data['image_path']))->toMediaCollection('slider.images');
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
