<?php

namespace App\Actions\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateCategoryAction
{
    /**
     * Update category along with media.
     *
     * @param array $data
     * @param Category $category
     * @return \App\Models\Category
     * @throws Exception
     */
    public function execute(array $data, Category $category)
    {
        DB::beginTransaction();

        try {
            $category->update($data);

            if (array_key_exists('image', $data)) {
                $category->media()->delete();
                $category->addMedia($data['image'])->toMediaCollection('category.images');
            }
            // Commit the transaction
            DB::commit();

            return $category;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
