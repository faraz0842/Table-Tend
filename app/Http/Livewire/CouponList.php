<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;

class CouponList extends Component
{
    /**
     * Declare a public property $searchCode
     * @var string
     */
    public string $searchCode;

    /**
     * Declare a public property $searchDiscount
     * @var string
     */
    public string $searchDiscount;

    /**
     * Declare a public property $searchDescription
     * @var string
     */
    public string $searchDescription;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchCode = '';
        $this->searchDiscount = '';
        $this->searchDescription = '';
    }

    public function render()
    {
        $coupons = Coupon::with(['discountType', 'discountables.discountable'])
            ->when($this->searchCode != '', function ($query) {
                $query->where('code', 'like', '%' . $this->searchCode . '%');
            })
            ->when($this->searchDiscount != '', function ($query) {
                $query->where('discount', 'like', '%' . $this->searchDiscount . '%');
            })
            ->when($this->searchDescription != '', function ($query) {
                $query->where('description', 'like', '%' . $this->searchDescription . '%');
            })
            ->paginate(10);
        return view('livewire.coupon-list')->with('coupons', $coupons);
        ;
    }
}
