<?php

namespace App\Actions\DistanceUnit;

use App\Models\DistanceUnit;
use App\Models\DistanceUnitTranslation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateDistanceUnit
{
    public function execute(array $data, DistanceUnit $distanceUnit)
    {
        DB::beginTransaction();

        try {
            $distanceUnit->update($data);

            foreach ($data as $locale => $value) {
                if (is_array($value)) {
                    $is_exist = DistanceUnitTranslation::where('distance_unit_id', $distanceUnit->id)->where('locale', $locale)->first();
                    if ($is_exist) {
                        $is_exist->update([
                            'name' => $value['name'],
                        ]);
                    } else {
                        DistanceUnitTranslation::create([
                            'distance_unit_id' => $distanceUnit->id,
                            'name' => $value['name'],
                            'locale' => $locale,
                        ]);
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return $distanceUnit;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
