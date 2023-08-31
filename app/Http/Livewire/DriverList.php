<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use Livewire\Component;

class DriverList extends Component
{
    /**
     * Declare a public property $searchDeliveryFee
     * @var string
     */
    public string $searchDeliveryFee;

    /**
     * Declare a public property $searchOrder
     * @var string
     */
    public string $searchOrder;

    /**
     * Declare a public property $searchUser
     * @var string
     */
    public string $searchUser;

    /**
     * Declare a public property $searchEarning
     * @var string
     */
    public string $searchEarning;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchDeliveryFee = '';
        $this->searchOrder = '';
        $this->searchEarning = '';
        $this->searchUser = '';
    }

    public function render()
    {
        $drivers = Driver::with('user')
            ->when($this->searchDeliveryFee != '', function ($query) {
                $query->where('delivery_fee', 'like', '%' . $this->searchDeliveryFee . '%');
            })
            ->when($this->searchOrder != '', function ($query) {
                $query->where('total_orders', 'like', '%' . $this->searchOrder . '%');
            })
            ->when($this->searchEarning != '', function ($query) {
                $query->where('earning', 'like', '%' . $this->searchEarning . '%');
            })
            ->whereHas('user', function ($query) {
                $query->when($this->searchUser != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchUser . '%');
                });
            })
            ->paginate(10);
        return view('livewire.driver-list')->with('drivers', $drivers);
    }
}
