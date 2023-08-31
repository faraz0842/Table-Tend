<?php

namespace App\Http\Livewire;

use App\Models\ExtraGroup;
use Livewire\Component;

class ExtragroupList extends Component
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
        $extraGroup = ExtraGroup::when($this->searchName != '', function ($query) {
            $query->whereHas('extraGroupTranslations', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);
        return view('livewire.extragroup-list')->with('extraGroup', $extraGroup);
    }
}
