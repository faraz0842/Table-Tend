<?php

namespace App\Http\Livewire;

use App\Models\DriverPayout;
use Livewire\Component;

class DriverPayoutList extends Component
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
        $driverPayout = DriverPayout::with(['user', 'paymentMethod'])
        ->whereHas('user', function ($query) {
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

        return view('livewire.driver-payout-list')->with('driverPayout', $driverPayout);
    }
}
