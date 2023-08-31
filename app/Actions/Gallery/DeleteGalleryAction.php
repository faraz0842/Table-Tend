<?php

namespace App\Actions\Gallery;

use App\Models\Gallery;

class DeleteGalleryAction
{
    public function execute(Gallery $gallery)
    {
        $isDelete = $gallery->delete();

        return $isDelete;
    }
}
