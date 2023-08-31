<?php

namespace App\Actions\Food;

use App\Models\Food;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreFoodAction
{
    /**
    * Store a newly created food in storage.
    *
    * @param  array  $data
    * @return Food
    * @throws Exception
    */
    public function execute($data = [])
    {
        DB::beginTransaction();
        try {
            $food = Food::create($data);

            if (isset($data['image'])) {
                $food->addMedia($data['image'])->toMediaCollection('food.images');
            }
            // Commit the transaction
            DB::commit();

            return $food;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
