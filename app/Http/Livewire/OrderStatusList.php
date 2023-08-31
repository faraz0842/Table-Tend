<?php

namespace App\Http\Livewire;

use App\Models\OrderStatus;
use Livewire\Component;

class OrderStatusList extends Component
{
    /**
     * Declare a public property $searchStatus
     * @var string
     */
    public string $searchStatus;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchStatus = '';
    }

    public function render()
    {
        $statuses = OrderStatus::when($this->searchStatus != '', function ($query) {
            $query->whereHas('orderStatusTranslations', function ($query) {
                $query->where('status', 'like', '%' . $this->searchStatus . '%');
            });
        })
            ->paginate(10);
        return view('livewire.order-status-list')->with('statuses', $statuses);
    }
}
