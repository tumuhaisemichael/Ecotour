<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        // Regenerate the session
        Session::regenerate();

        // Get the authenticated user's role
        $userRole = Auth::user()->role;

        // Redirect based on the user's role
        switch ($userRole) {
            case 'admin':
                $this->redirect(route('admin.dashboard'), navigate: true);
                break;
            case 'host':
                $this->redirect(route('host.dashboard'), navigate: true);
                break;
            default:
                $this->redirect(route('tourist.dashboard'), navigate: true);
                break;
        }
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
