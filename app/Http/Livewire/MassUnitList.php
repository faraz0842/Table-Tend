<?php

namespace App\Http\Livewire;

use App\Models\MassUnit;
use Livewire\Component;

class MassUnitList extends Component
{
    /**
     * Declare a public property $searchFullForm
     * @var string
     */
    public string $searchFullForm;

    /**
     * Declare a public property $searchShortForm
     * @var string
     */
    public string $searchShortForm;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchFullForm = '';
        $this->searchShortForm = '';
    }

    public function render()
    {
        $units = MassUnit::when($this->searchFullForm != '', function ($query) {
            $query->whereHas('massUnitTranslations', function ($query) {
                $query->where('full_form', 'like', '%' . $this->searchFullForm . '%');
            });
        })
            ->when($this->searchShortForm != '', function ($query) {
                $query->whereHas('massUnitTranslations', function ($query) {
                    $query->where('short_form', 'like', '%' . $this->searchShortForm . '%');
                });
            })
            ->paginate(10);
        return view('livewire.mass-unit-list')->with('units', $units);
    }
}
