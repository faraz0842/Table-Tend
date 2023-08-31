<?php

namespace App\Http\Livewire;

use App\Models\AppSlider;
use Livewire\Component;

class MobileSliderList extends Component
{
    /**
     * Declare a public property $searchOrder
     * @var string
     */
    public string $searchOrder;

    /**
     * Declare a public property $searchText
     * @var string
     */
    public string $searchText;

    /**
     * Declare a public property $searchButton
     * @var string
     */
    public string $searchButton;

    /**
     * Declare a public property $searchFood
     * @var string
     */
    public string $searchFood;

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
        $this->searchOrder = '';
        $this->searchText = '';
        $this->searchButton = '';
        $this->searchFood = '';
        $this->searchRestaurant = '';
    }

    public function render()
    {
        $sliders = AppSlider::with(['restaurant', 'food'])
            ->whereHas('sliderTranslations', function ($query) {
                $query->when($this->searchText != '', function ($q) {
                    $q->where('text', 'like', '%' . $this->searchText . '%');
                });
            })
            ->whereHas('sliderTranslations', function ($query) {
                $query->when($this->searchButton != '', function ($q) {
                    $q->where('button', 'like', '%' . $this->searchButton . '%');
                });
            })
            ->whereHas('food.foodTranslations', function ($query) {
                $query->when($this->searchFood != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchFood . '%');
                });
            })
            ->whereHas('restaurant.restaurantTranslations', function ($query) {
                $query->when($this->searchRestaurant != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchRestaurant . '%');
                });
            })
            ->when($this->searchOrder != '', function ($query) {
                $query->where('order', 'like', '%' . $this->searchOrder . '%');
            })
            ->paginate(10);

        return view('livewire.mobile-slider-list')->with('sliders', $sliders);
    }
}
