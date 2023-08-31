<?php

namespace App\Http\Livewire;

use App\Models\RestaurantPayout;
use Livewire\Component;

class RestaurantPayoutList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
    * Declare a public property $searchMethod
    * @var string
    */
    public string $searchMethod;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchMethod = '';
    }

    public function render()
    {
        $restaurantPayout = RestaurantPayout::with(['restaurant', 'paymentMethod'])
        ->whereHas('restaurant.restaurantTranslations', function ($query) {
            $query->when($this->searchName != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->whereHas('paymentMethod.paymentMethodTranslations', function ($query) {
            $query->when($this->searchMethod != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchMethod . '%');
            });
        })
        ->paginate(10);

        return view('livewire.restaurant-payout-list')->with('restaurantPayout', $restaurantPayout);
    }
}
