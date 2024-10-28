<?php

namespace App\Observers;

use App\Models\Experience;
use App\Models\User;
use App\Notifications\NewExperienceNotification;

class ExperienceObserver
{
    public function created(Experience $experience)
    {
        // Notify all users who have opted in to experience notifications
        User::where('id', $experience->host_id)
            ->each(function ($user) use ($experience) {
                $user->notify(new NewExperienceNotification($experience));
            });
        User::where('role', 'admin')
            ->each(function ($user) use ($experience) {
                $user->notify(new NewExperienceNotification($experience));
            });
    }
}
