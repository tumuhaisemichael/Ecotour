<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmation extends Notification implements ShouldQueue
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
            ->subject('Booking Confirmation - ' . $experience->title)
            ->greeting('Hello ' . $tourist->name . '!')
            ->line('Thank you for booking your experience with us!')
            ->line('Here are your booking details:')
            ->line('Experience: ' . $experience->title)
            ->line('Date: ' . $this->booking->scheduled_date->format('F j, Y \a\t g:i A'))
            ->line('Total Amount: $' . number_format($this->booking->total_amount, 2))
            ->line('Payment Status: ' . ucfirst($this->booking->payment_status))
            ->action('View Booking Details', url('/bookings/' . $this->booking->id))
            ->line('The host has been notified and will be ready to welcome you!')
            ->line('If you need to make any changes to your booking, please contact us.');
    }

    public function toArray($notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'experience_title' => $this->booking->experience->title,
            'scheduled_date' => $this->booking->scheduled_date,
        ];
    }
}
