<?php

namespace App\Http\Livewire;

use App\Models\Food;
use Livewire\Component;

class FoodList extends Component
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
        $foods = Food::when($this->searchName != '', function ($query) {
            $query->whereHas('foodTranslations', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);
        return view('livewire.food-list')->with('foods', $foods);
    }
}
