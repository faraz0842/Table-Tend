<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use Livewire\Component;

class ExtraList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
    * Declare a public property $searchFood
    * @var string
    */
    public string $searchFood;

    /**
    * Declare a public property $searchExtraGroup
    * @var string
    */
    public string $searchExtraGroup;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchFood = '';
        $this->searchExtraGroup = '';
    }

    public function render()
    {
        $extra = Extra::with(['extraGroup', 'food'])
            ->whereHas('extraTranslations', function ($query) {
                $query->when($this->searchName != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchName . '%');
                });
            })
            ->whereHas('food.foodTranslations', function ($query) {
                $query->when($this->searchFood != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchFood . '%');
                });
            })
            ->whereHas('extraGroup.extraGroupTranslations', function ($query) {
                $query->when($this->searchExtraGroup != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchExtraGroup . '%');
                });
            })
            ->paginate(10);

        return view('livewire.extra-list')->with('extra', $extra);
    }
}
