<?php

namespace App\Observers;

use App\Models\Booking;
use App\Notifications\BookingConfirmation;
use App\Notifications\NewBookingNotification;
use Illuminate\Support\Facades\Log;


class BookingObserver
{
    public function created(Booking $booking)
    {
        try {
            // Notify the tourist
            $booking->tourist->notify(new BookingConfirmation($booking));

            // Notify the host
            $booking->experience->host->notify(new NewBookingNotification($booking));
        }catch (\Exception $e){
            // Log the error
            Log::error(
                'Failed to send notifications for booking ' . $booking->id . ' - ' . $e->getMessage()
            );
        }

    }
}
