<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.admin')]
class Users extends Component
{
    public $users;
    public $selectedUser = null;
    public $action = '';

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function mount()
    {
        $this->users = User::all();
    }

    public function addUser()
    {
        $this->action = 'add';
        $this->selectedUser = null;
        $this->dispatch('showUserFormModal');
    }

    public function editUser(User $user)
    {
        $this->action = 'edit';
        $this->selectedUser = $user;
        $this->dispatch('showUserFormModal', $user->id);
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin.users');
    }
}
