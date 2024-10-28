<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $experience = $this->booking->experience;
        $tourist = $this->booking->tourist;

        return (new MailMessage)
            ->subject('New Booking: ' . $experience->title)
            ->greeting('Hello ' . $experience->host->name . '!')
            ->line('You have a new booking for your experience!')
            ->line('Booking Details:')
            ->line('Tourist: ' . $tourist->name)
            ->line('Experience: ' . $experience->title)
            ->line('Date: ' . $this->booking->scheduled_date->format('F j, Y \a\t g:i A'))
            ->line('Total Amount: $' . number_format($this->booking->total_amount, 2))
            ->action('View Booking Details', url('/host/bookings/' . $this->booking->id))
            ->line('Please ensure you\'re prepared to host on the scheduled date.')
            ->line('If you need to make any changes, please contact the tourist directly.');
    }

    public function toArray($notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'tourist_name' => $this->booking->tourist->name,
            'experience_title' => $this->booking->experience->title,
            'scheduled_date' => $this->booking->scheduled_date,
        ];
    }
}
