<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderList extends Component
{
    /**
     * Declare a public property $searchId
     * @var string
     */
    public string $searchId;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchId = '';
    }

    public function render()
    {
        $orders = Order::when($this->searchId != '', function ($query) {
            $query->where('id', 'like', '%' . $this->searchId . '%');
        })
            ->paginate(10);
        return view('livewire.order-list')->with('orders', $orders);
    }
}
