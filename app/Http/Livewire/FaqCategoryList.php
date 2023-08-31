<?php

namespace App\Http\Livewire;

use App\Models\FaqCategory;
use Livewire\Component;

class FaqCategoryList extends Component
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
        $faqCategories = FaqCategory::whereHas('faqCategoryTranslations', function ($query) {
            $query->when($this->searchName != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchName . '%');
            });
        })
            ->paginate(10);
        return view('livewire.faq-category-list')->with('faqCategories', $faqCategories);
    }
}
