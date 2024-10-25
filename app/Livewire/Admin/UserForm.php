<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserForm extends Component
{
    public $userId, $name, $email, $role, $phone_number, $profile_picture, $bio;
    public $password;

    // Remove this since we're using the #[On] attribute
    // protected $listeners = ['showUserFormModal' => 'loadUser'];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->userId)],
            'role' => 'required|in:admin,host,tourist',
            'phone_number' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'password' => $this->userId ? 'nullable|min:8' : 'required|min:8', // Make password optional for updates
        ];
    }

    #[On('showUserFormModal')]
    public function loadUser($userId = null)
    {
        $this->reset(); // Clear previous form data

        if ($userId) {
            $user = User::findOrFail($userId);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->phone_number = $user->phone_number;
            $this->bio = $user->bio;
            $this->password = null; // Clear password field for editing
        }

        $this->dispatch('js:show-user-modal');
    }

    public function saveUser()
    {
        $validatedData = $this->validate();

        try {
            if ($this->userId) {
                // Update existing user
                $user = User::findOrFail($this->userId);

                // Remove password from validated data if it's empty
                if (empty($validatedData['password'])) {
                    unset($validatedData['password']);
                } else {
                    $validatedData['password'] = Hash::make($validatedData['password']);
                }

                $user->update($validatedData);
            } else {
                // Create new user
                $validatedData['password'] = Hash::make($validatedData['password']);
                User::create($validatedData);
            }

            $this->reset(); // Clear form after successful save
            $this->dispatch('js:hide-user-modal');
            $this->dispatch('refreshUsers');

        } catch (\Exception $e) {
            // Handle any errors
            session()->flash('error', 'Error saving user: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.user-form');
    }
}
