<?php

namespace App\Actions\Gallery;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateGalleryAction
{
    public function execute(array $data, Gallery $gallery)
    {
        DB::beginTransaction();

        try {
            $gallery->update($data);

            if (array_key_exists('image', $data)) {
                $gallery->media()->delete();
                $gallery->addMedia($data['image'])->toMediaCollection('gallery.images');
            }
            // Commit the transaction
            DB::commit();

            return $gallery;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
