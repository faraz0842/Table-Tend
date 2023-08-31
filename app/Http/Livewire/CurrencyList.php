<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use Illuminate\View\View;
use Livewire\Component;

class CurrencyList extends Component
{
    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

    /**
     * Declare a public property $searchCode
     * @var string
     */
    public string $searchCode;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchCode = '';
    }

    /**
     * Renders the view for the currency list.
     *
     * @return View
     */
    public function render(): View
    {
        $currencies = Currency::when($this->searchName != '', function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })
            ->when($this->searchCode != '', function ($query) {
                $query->where('code', 'like', '%' . $this->searchCode . '%');
            })
            ->paginate(10);
        return view('livewire.currency-list')->with('currencies', $currencies);
    }
}
