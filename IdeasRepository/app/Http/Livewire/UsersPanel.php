<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersPanel extends Component
{
    use WithPagination;
    
    public $searchTerm;
    public $modalOpened = false;
    public $userShowedNewData = [];
    public $action, $userShowed = null;

    /**
     * Shows views and could add an array with data
     * 
     * @var array
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $users = User::select('id', 'name', 'email', 'profile_photo_path', 'created_at')
                    ->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                    ->paginate(6);

        return view('livewire.users-panel',['users'=> $users]);
    }

    /**
     * Extract user info;
     */
    private function extractUser(int $id)
    {
        $this->userShowed = User::firstWhere('id', $id);
        $this->userShowedNewData += ['created_at' =>  \Carbon\Carbon::parse($this->userShowed->created_at)->format('l, d F Y H:i')];
    }

    /**
     * Show User info
     * 
     * @param int userId
     */
    public function show(int $id)
    {
        try {
            $this->action = 'show';
            $this->extractUser($id);
            $this->openModal();

        } catch (\Throwable $th) {
            session()->flash('error_message', __('User not found.'));
        }
    }

    /**
     * Delete User info
     * 
     * @param int userId
     */
    public function delete(int $id)
    {
        $this->action = 'delete';
        $this->extractUser($id);
        $this->openModal();
    }

    /**
     * Delete User info
     * 
     * @param int userId
     */
    public function deleteUser()
    {
        try {
            User::destroy($this->userShowed->id);
            $this->closeModal();
            session()->flash('success_message', __('User deleted.'));
        } catch (\Throwable $th) {
            session()->flash('error_message', __('User not found.'));
        }
    }

    /**
     * Change default value of modalOpened showing the modal
     * 
     * @var bool modalOpened
     */
    public function openModal()
    {
        $this->modalOpened = true;
    }

    /**
     * Change default value of modalOpened closing the modal
     * 
     * @var bool modalOpened
     */
    public function closeModal()
    {
        $this->reinitilizeModal();
        $this->modalOpened = false;
    }

    /**
     * Reinitialize userShowed and userShowedNewData
     * 
     */
    public function reinitilizeModal()
    {
        $this->searchTerm = null;
        $this->action = null;
        $this->userShowed = null;
        $this->userShowedNewData = [];
    }
}
