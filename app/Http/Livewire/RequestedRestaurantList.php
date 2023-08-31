<?php

namespace App\Http\Livewire;

use App\Models\Restaurant;
use Livewire\Component;

class RequestedRestaurantList extends Component
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
        $restaurants = Restaurant::when($this->searchName != '', function ($query) {
            $query->whereHas('restaurantTranslations', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
            ->paginate(10);
        return view('livewire.requested-restaurant-list')->with('restaurants', $restaurants);
    }
}
