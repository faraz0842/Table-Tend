<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
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
        $categories = Category::when($this->searchName != '', function ($query) {
            $query->whereHas('categoryTranslations', function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
        ->paginate(10);
        return view('livewire.category-list')->with('categories', $categories);
    }
}
