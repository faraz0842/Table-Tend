<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqList extends Component
{
    /**
    * Declare a public property $searchQuestion
    * @var string
    */
    public string $searchQuestion;

    /**
    * Declare a public property $searchAnswer
    * @var string
    */
    public string $searchAnswer;

    /**
    * Declare a public property $searchFaqCategory
    * @var string
    */
    public string $searchFaqCategory;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchQuestion = '';
        $this->searchAnswer = '';
        $this->searchFaqCategory = '';
    }

    public function render()
    {
        $faqs = Faq::whereHas('faqTranslations', function ($query) {
            $query->when($this->searchQuestion != '', function ($q) {
                $q->where('question', 'like', '%' . $this->searchQuestion . '%');
            });
        })
        ->whereHas('faqTranslations', function ($query) {
            $query->when($this->searchAnswer != '', function ($q) {
                $q->where('answer', 'like', '%' . $this->searchAnswer . '%');
            });
        })
        ->whereHas('faqCategory.faqCategoryTranslations', function ($query) {
            $query->when($this->searchFaqCategory != '', function ($q) {
                $q->where('name', 'like', '%' . $this->searchFaqCategory . '%');
            });
        })
            ->paginate(10);
        return view('livewire.faq-list')->with('faqs', $faqs);
    }
}
