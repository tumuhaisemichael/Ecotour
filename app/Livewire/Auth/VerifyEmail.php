<?php

namespace App\Livewire\Auth;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class VerifyEmail extends Component
{
    public function sendVerification(): RedirectResponse
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        Auth::user()->sendEmailVerificationNotification();
        Session::flash('status', 'verification-link-sent');

        return redirect()->route('verification.notice');
    }

    public function logout(Logout $logout): RedirectResponse
    {
        $logout();
        return redirect('/');
    }


    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
