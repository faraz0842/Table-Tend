<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class RestaurantGalleryList extends Component
{
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
        $this->searchDescription = '';
    }

    public function render()
    {
        $galleries = Gallery::when($this->searchDescription != '', function ($query) {
            $query->whereHas('galleryTranslations', function ($query) {
                $query->where('description', 'like', '%' . $this->searchDescription . '%');
            });
        })
            ->paginate(10);
        return view('livewire.restaurant-gallery-list')->with('galleries', $galleries);
    }
}
