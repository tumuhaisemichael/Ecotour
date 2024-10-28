<div>
    <div class="container mt-5">
        <div style="height: 20vh;">
            <!-- spacer -->
        </div>
        <!-- Upcoming Bookings -->
        <div class="row card-section">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5><i class="fas fa-calendar-check"></i> Your Bookings</h5>
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Experience</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->experience->title }}</td>
                                        <td>{{ $booking->scheduled_date->format('M d, Y') }}</td>
                                        <td>{{ $booking->experience->location }}</td>
                                        <td>${{ number_format($booking->total_amount, 2) }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $booking->payment_status == 'Confirmed' ? 'success' : 'warning' }}">
                                                {{ $booking->payment_status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('tourist.booking-details', $booking->experience->id) }}"
                                                class="btn btn-info btn-sm">Details</a>
                                            <a href="{{ route('tourist.write-review', $booking->experience->id) }}"
                                                class="btn btn-secondary btn-sm">Review</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">You have no bookings yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>