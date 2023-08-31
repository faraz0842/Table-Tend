<?php

namespace App\Http\Livewire;

use App\Models\Nutrition;
use Livewire\Component;

class NutritionList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
    * Declare a public property $searchFood
    * @var string
    */
    public string $searchFood;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchFood = '';
    }

    public function render()
    {
        $nutritions = Nutrition::whereHas('food.foodTranslations', function ($query) {
            $query->when($this->searchFood != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchFood . '%');
            });
        })
        ->whereHas('nutritionTranslations', function ($query) {
            $query->when($this->searchName != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);

        return view('livewire.nutrition-list')->with('nutritions', $nutritions);
    }
}
