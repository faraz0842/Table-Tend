<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Food;
use App\Models\Restaurant;
use Livewire\Component;

class FoodDropdown extends Component
{
    public $categories;

    public $restaurants;

    public $foods;

    public $selectedFood;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->restaurants = Restaurant::all();
        $this->categories = Category::with('foods')->get();
        $this->foods = collect($this->categories)->pluck('foods');
    }

    public function render()
    {
        return view('livewire.food-dropdown');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedSelectedFood($food)
    {
        if (! is_null($food)) {
            $this->foods = Food::get();
            dd($this->foods);

            return $this->foods;
        }
    }
}
