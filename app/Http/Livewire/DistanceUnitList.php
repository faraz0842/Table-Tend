<?php

namespace App\Http\Livewire;

use App\Models\DistanceUnit;
use Livewire\Component;

class DistanceUnitList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
    }

    public function render()
    {
        $distanceUnits = DistanceUnit::whereHas('distanceUnitTranslations', function ($query) {
            $query->when($this->searchName != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);

        return view('livewire.distance-unit-list')->with('distanceUnits', $distanceUnits);
    }
}
