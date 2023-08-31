<?php

namespace App\Http\Livewire;

use App\Models\SettingType;
use Livewire\Component;

class SettingTypeList extends Component
{
    /**
    * Declare a public property $searchName
    * @var string
    */
    public string $searchName;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
    }

    public function render()
    {
        $settingTypes = SettingType::whereHas('settingTypeTranslations', function ($query) {
            $query->when($this->searchName != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);

        return view('livewire.setting-type-list')->with('settingTypes', $settingTypes);
    }
}
