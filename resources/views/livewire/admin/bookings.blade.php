<div>
    <div class="container mt-4">
        <h2 class="text-center mb-4">All Bookings</h2>

        <!-- Display success message -->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
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
                            <!-- Delete button -->
                            <button wire:click="deleteBooking({{ $booking->id }})"
                                class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No bookings found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>