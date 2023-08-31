<?php

namespace App\Actions\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    /**
     * Delete category and its translations.
     *
     * @param Category $category
     *
     * @return array Contains 'isDelete' boolean value for deletion status.
     */
    public function execute(Category $category)
    {
        $category->media()->delete();

        $category->foods()->delete();
        $category->deleteTranslations();
        $isDeleted = $category->delete();
        return $isDeleted;
    }
}
