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
    public $searchTerm = '';

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $query = User::query();
        
        if (!empty($this->searchTerm)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('role', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $this->users = $query->get();
    }

    public function search()
    {
        $this->loadUsers();
    }

    public function updatedSearchTerm()
    {
        $this->loadUsers();
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
        return view('livewire.admin.users');
    }
}