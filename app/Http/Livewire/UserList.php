<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

    /**
     * Declare a public property $searchEmail
     * @var string
     */
    public string $searchEmail;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchEmail = '';
    }

    public function render()
    {
        $users = User::when($this->searchName != '', function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })
            ->when($this->searchEmail != '', function ($query) {
                $query->where('email', 'like', '%' . $this->searchEmail . '%');
            })
            ->paginate(10);

        return view('livewire.user-list')->with(['users' => $users]);
    }
}
