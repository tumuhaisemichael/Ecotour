<div>
    <style>
    .dashboard-header {
        margin-top: 120px;
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
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center">
            <h2>Welcome Back, {{ Auth::user()->name }}!</h2>
            <p>Your personalized EcoTour dashboard with your latest bookings, recommended experiences, and more!</p>
        </div>

        <!-- Profile Summary & Account Info -->
        <div class="row card-section">
            <div class="col-md-4 profile-section">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-2x text-gray-600"></i>
                        <h2>Welcome Back, {{ Auth::user()->name }}!</h2>

                        <p class="text-muted">Member since: {{ Auth::user()->created_at->format('M Y') }}</p>
                        <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>

            <!-- Account Info -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <i class="fas fa-wallet card-icon"></i>
                            <h5>Your EcoTour Balance</h5>
                        </div>
                        <p><strong>Current Balance:</strong> $120.00</p>
                        <p><strong>Total Spent:</strong> $520.00</p>
                        <button class="btn btn-success btn-sm">Top Up Balance</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Bookings -->
        <div class="row card-section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5><i class="fas fa-calendar-check"></i> Upcoming Bookings</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-3">
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
                                    <!-- Dummy Booking Data -->
                                    <tr>
                                        <td>Nature Safari</td>
                                        <td>Dec 15, 2023</td>
                                        <td>Queen Elizabeth National Park</td>
                                        <td>$150.00</td>
                                        <td><span class="badge badge-success">Confirmed</span></td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Details</a>
                                            <a href="#" class="btn btn-secondary btn-sm">Review</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mountain Hike</td>
                                        <td>Jan 10, 2024</td>
                                        <td>Mount Elgon</td>
                                        <td>$200.00</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Details</a>
                                            <a href="#" class="btn btn-secondary btn-sm">Review</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary btn-sm mt-3">View All Bookings</a>
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
                                    <img class="card-img-top" src="https://via.placeholder.com/150"
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
                                    <img class="card-img-top" src="https://via.placeholder.com/150"
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
                                    <img class="card-img-top" src="https://via.placeholder.com/150"
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
                        <h5><i class="fas fa-leaf"></i> EcoTour Membership Perks</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check-circle"></i> Exclusive Discounts</li>
                            <li><i class="fas fa-check-circle"></i> Personalized Recommendations</li>
                            <li><i class="fas fa-check-circle"></i> Early Access to New Experiences</li>
                        </ul>
                        <button class="btn btn-outline-success btn-sm">Upgrade Your Membership</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
