<div>
    <style>
    .dashboard-header {
        margin-top: 20px;
    }

    .dashboard-header h2 {
        font-size: 2rem;
    }

    .card-section {
        margin-top: 20px;
    }

    .card-icon {
        font-size: 2.5rem;
        color: #28a745;
    }

    .card-header {
        display: flex;
        align-items: center;
    }

    .card-header h5 {
        margin-left: 10px;
    }

    .profile-section img {
        border-radius: 50%;
    }
    </style>

    <div class="container">
        <div style="height: 20vh;">
            <!-- spacer -->
        </div>
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center">
            <h2>Welcome Back, {{ Auth::user()->name }}!</h2>
            <p>Your personalized EcoTour dashboard with your latest bookings, recommended experiences, and more!</p>
        </div>

        <div class="container mt-5">
            <div class="row">
                <!-- Profile Section -->
                <div class="col-md-4 profile-section">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                            <h4 class="mb-1">Welcome Back, {{ Auth::user()->name }}!</h4>
                            <p class="text-muted">Member since: {{ Auth::user()->created_at->format('M Y') }}</p>
                            <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm mb-2">View
                                Profile</a>
                        </div>
                    </div>
                </div>

                <!-- Account Info Section -->
                <div class="col-md-4 account-section">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-wallet fa-2x text-success mb-2"></i>
                            <h5 class="card-title">Your EcoTour Balance</h5>
                            <p><strong>Current Balance:</strong> $120.00</p>
                            <p><strong>Total Spent:</strong> $520.00</p>
                            <button class="btn btn-success btn-sm">Top Up Balance</button>
                        </div>
                    </div>
                </div>

                <!-- Logout Section -->
                <div class="col-md-4 logout-section">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-sign-out-alt fa-2x text-danger mb-2"></i>
                            <h5 class="card-title">Logout</h5>
                            <p class="text-muted">Ready to leave? Click below to log out of your account.</p>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                        <h5><i class="fas fa-calendar-check"></i> Upcoming Bookings</h5>
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
                            <a href="{{ route('tourist.bookings') }}" class="btn btn-primary btn-sm mt-3">View All
                                Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Experiences -->
        <div class="row card-section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5><i class="fas fa-star"></i> Recommended Experiences for You</h5>
                        <div class="row">
                            <!-- Dummy Experience Cards -->
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img class="card-img-top" src="{{ asset('assets/tourist/img/pack.jpg') }}"
                                        alt="Experience Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Sunset Cruise</h5>
                                        <p class="card-text">Enjoy a beautiful sunset cruise on the Nile.</p>
                                        <a href="#" class="btn btn-primary btn-sm">Explore</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img class="card-img-top" src="{{ asset('assets/tourist/img/pack.jpg') }}"
                                        alt="Experience Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Bird Watching Tour</h5>
                                        <p class="card-text">Discover exotic birds in the wetlands.</p>
                                        <a href="#" class="btn btn-primary btn-sm">Explore</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img class="card-img-top" src="{{ asset('assets/tourist/img/pack.jpg') }}"
                                        alt="Experience Image">
                                    <div class="card-body">
                                        <h5 class="card-title">Cultural Experience</h5>
                                        <p class="card-text">Immerse yourself in local traditions and culture.</p>
                                        <a href="#" class="btn btn-primary btn-sm">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EcoTour Membership Perks -->
        <div class="row card-section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-leaf"></i> EcoTour Perks</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check-circle"></i> Discounts</li>
                            <li><i class="fas fa-check-circle"></i> Tailored Picks</li>
                            <li><i class="fas fa-check-circle"></i> Early Access</li>
                        </ul>
                        <button class="btn btn-outline-success btn-sm">Upgrade Now</button>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>