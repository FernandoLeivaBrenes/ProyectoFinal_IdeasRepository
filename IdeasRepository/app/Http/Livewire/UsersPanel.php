<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersPanel extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        return view('livewire.users-panel',['users'=> User::where('name', 'like', '%'.$this->searchTerm.'%')->paginate(5)]);
    }
}
