<div>
    <h1>Bookings Management</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Tourist</th>
                <th>Experience</th>
                <th>Booking Date</th>
                <th>Scheduled Date</th>
                <th>Total Amount</th>
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->tourist->name }}</td>
                    <td>{{ $booking->experience->title }}</td>
                    <td>{{ $booking->booking_date->format('Y-m-d H:i') }}</td>
                    <td>{{ $booking->scheduled_date->format('Y-m-d H:i') }}</td>
                    <td>${{ number_format($booking->total_amount, 2) }}</td>
                    <td>{{ ucfirst($booking->payment_status) }}</td>
                    <td>
                        <button wire:click="editBooking({{ $booking->id }})" class="btn btn-warning">Edit</button>
                        <button wire:click="deleteBooking({{ $booking->id }})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $bookings->links() }} <!-- For pagination links -->
    </div>
</div>
