<div>
    <div class="container-fluid">
        <h1 class="mb-4 text-center">Host Dashboard</h1>

        <!-- Quick Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Your Experiences</h5>
                        <p class="card-text display-4">{{ $totalExperiences }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Your Bookings</h5>
                        <p class="card-text display-4">{{ $totalBookings }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text display-4">${{ number_format($totalRevenue, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pending Reports</h5>
                        <p class="card-text display-4">{{ $pendingReports }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Recent Bookings</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tourist</th>
                            <th>Experience</th>
                            <th>Booking Date</th>
                            <th>Scheduled Date</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestBookings as $booking)
                        <tr>
                            <td>{{ $booking->tourist->name }}</td>
                            <td>{{ $booking->experience->title }}</td>
                            <td>{{ $booking->booking_date->format('Y-m-d H:i') }}</td>
                            <td>{{ $booking->scheduled_date->format('Y-m-d H:i') }}</td>
                            <td>${{ number_format($booking->total_amount, 2) }}</td>
                            <td>{{ ucfirst($booking->payment_status) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Payments Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Recent Payments</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Transaction Reference</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestPayments as $payment)
                        <tr>
                            <td>{{ $payment->booking_id }}</td>
                            <td>{{ ucfirst($payment->payment_method) }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ $payment->transaction_reference }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Reviews Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Recent Reviews</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tourist</th>
                            <th>Experience</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestReviews as $review)
                        <tr>
                            <td>{{ $review->tourist->name }}</td>
                            <td>{{ $review->experience->title }}</td>
                            <td>{{ $review->rating }}/5</td>
                            <td>{{ $review->comment ?? 'No comment' }}</td>
                            <td>{{ $review->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>