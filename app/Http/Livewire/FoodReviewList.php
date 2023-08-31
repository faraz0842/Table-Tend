<?php

namespace App\Http\Livewire;

use App\Models\FoodReview;
use Livewire\Component;

class FoodReviewList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
    * Declare a public property $searchUser
    * @var string
    */
    public string $searchUser;

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
        $this->searchUser = '';
        $this->searchFood = '';
    }

    public function render()
    {
        $foodReview = FoodReview::with(['user', 'food'])
        ->whereHas('user', function ($query) {
            $query->when($this->searchUser != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchUser . '%');
            });
        })
        ->whereHas('food.foodTranslations', function ($query) {
            $query->when($this->searchFood != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchFood . '%');
            });
        })
        ->when($this->searchName != '', function ($query) {
            $query->where('review', 'like', '%' . $this->searchName . '%');
        })
        ->paginate(10);

        return view('livewire.food-review-list')->with('foodReview', $foodReview);
    }
}
