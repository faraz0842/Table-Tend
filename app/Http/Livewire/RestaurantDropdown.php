<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Restaurant;
use Livewire\Component;

class RestaurantDropdown extends Component
{
    public $selectedRestaurant;

    public $restaurants;

    public $categories;

    public $selectedCategory;

    public $foods;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->restaurants = Restaurant::all();
        $this->foods = Food::all();
        $this->categories = collect();
    }

    public function render()
    {
        return view('livewire.restaurant-dropdown');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedSelectedRestaurant($restaurant)
    {
        if (! is_null($restaurant)) {
            $this->foods = Food::where('category_id', $this->selectedCategory)
                ->get();

            return $this->foods;
        }
    }
}
