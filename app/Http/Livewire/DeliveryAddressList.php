<?php

namespace App\Http\Livewire;

use App\Models\DeliveryAddress;
use Livewire\Component;

class DeliveryAddressList extends Component
{
    /**
     * Declare a public property $searchDescription
     * @var string
     */
    public string $searchDescription;

    /**
     * Declare a public property $searchAddress
     * @var string
     */
    public string $searchAddress;

    /**
     * Declare a public property $searchUser
     * @var string
     */
    public string $searchUser;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchDescription = '';
        $this->searchAddress = '';
        $this->searchUser = '';
    }

    public function render()
    {
        $addresses = DeliveryAddress::with('user')
            ->when($this->searchDescription != '', function ($query) {
                $query->where('description', 'like', '%' . $this->searchDescription . '%');
            })
            ->when($this->searchAddress != '', function ($query) {
                $query->where('address', 'like', '%' . $this->searchAddress . '%');
            })
            ->whereHas('user', function ($query) {
                $query->when($this->searchUser != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchUser . '%');
                });
            })
            ->paginate(10);
        return view('livewire.delivery-address-list')->with('addresses', $addresses);
    }
}
