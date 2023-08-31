<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\Restaurant;
use Livewire\Component;

class Category extends Component
{
    public $categories;

    public $restaurants;

    public $foods;

    public $selectedCategory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function mount()
    {
        $this->restaurants = Restaurant::all();
        $this->foods = Food::with('category')->get();
        $this->categories = collect($this->foods)->pluck('category');
    }

    public function render()
    {
        return view('livewire.category');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedSelectedCategory($category)
    {
        if (! is_null($category)) {
            $this->foods = Food::where('category_id', $this->selectedCategory)
                ->get();

            return $this->foods;
        }
    }
}
