<?php

namespace App\Http\Livewire;

use App\Models\RestaurantReview;
use Livewire\Component;

class RestaurantReviewList extends Component
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
     * Declare a public property $searchRestaurant
     * @var string
     */
    public string $searchRestaurant;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchUser = '';
        $this->searchRestaurant = '';
    }

    public function render()
    {
        $restaurantReview = RestaurantReview::with(['user', 'restaurant'])
            ->whereHas('user', function ($query) {
                $query->when($this->searchUser != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchUser . '%');
                });
            })
            ->whereHas('restaurant.restaurantTranslations', function ($query) {
                $query->when($this->searchRestaurant != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchRestaurant . '%');
                });
            })
            ->when($this->searchName != '', function ($query) {
                $query->where('review', 'like', '%' . $this->searchName . '%');
            })
            ->paginate(10);

        return view('livewire.restaurant-review-list')->with('restaurantReview', $restaurantReview);
    }
}
