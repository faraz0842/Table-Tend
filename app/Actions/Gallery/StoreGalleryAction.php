<?php

namespace App\Actions\Gallery;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreGalleryAction
{
    public function execute(array $data)
    {
        DB::beginTransaction();

        try {
            $gallery = Gallery::create($data);

            if (isset($data['image'])) {
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
