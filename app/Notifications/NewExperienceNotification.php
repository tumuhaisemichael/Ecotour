<?php

namespace App\Notifications;

use App\Models\Experience;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewExperienceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $experience;

    public function __construct(Experience $experience)
    {
        $this->experience = $experience;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Experience Published: ' . $this->experience->title)
            ->greeting('Hello!')
            ->line('A new experience has been added to our platform!')
            ->line('Experience Details:')
            ->line('Title: ' . $this->experience->title)
            ->line('Host: ' . $this->experience->host->name)
            ->line('Price: $' . number_format($this->experience->price, 2))
            ->line('Description: ' . $this->experience->description)
            ->action('View Experience', url('/experiences/' . $this->experience->id))
            ->line('Book now to secure your spot!');
    }

    public function toArray($notifiable): array
    {
        return [
            'experience_id' => $this->experience->id,
            'title' => $this->experience->title,
            'host_name' => $this->experience->host->name,
        ];
    }
}
