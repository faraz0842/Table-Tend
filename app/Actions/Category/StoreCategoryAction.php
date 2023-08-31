<?php

namespace App\Actions\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreCategoryAction
{
    /**
     * Store a newly created category in storage.
     *
     * @param  array  $data
     * @return Category
     * @throws Exception
     */
    public function execute(array $data): Category
    {
        DB::beginTransaction();

        try {
            $category = Category::create($data);

            if (isset($data['image'])) {
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
