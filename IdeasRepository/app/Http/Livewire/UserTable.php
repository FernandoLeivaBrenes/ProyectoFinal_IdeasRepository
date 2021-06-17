<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public function render()
    {
        return view('livewire.user-table')->with(['users' => User::paginate(5)]);
    }

    private static function executeRedirect()
    {
        return redirect('projects');
    }
}
