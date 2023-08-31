<?php

namespace App\Http\Livewire;

use App\Models\Cuisine;
use Livewire\Component;

class CuisineList extends Component
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
        $cuisines = Cuisine::when($this->searchName != '', function ($query) {
            $query->whereHas('cuisineTranslations', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
            ->paginate(10);
        return view('livewire.cuisine-list')->with('cuisines', $cuisines);
    }
}
