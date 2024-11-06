<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<div class="container mt-4">

    <!-- Page Heading -->
    <h1 class="text-center mb-4" style="font-size: 36px; font-weight: bold; color: #4CAF50;">
        Admin Reports
    </h1>

    <!-- Card for Metrics -->
    <div class="card mb-4 shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
        <div class="card-body">
            <!-- Dropdown for Total Users -->
            <div class="mb-3">
                <button class="btn btn-primary btn-sm w-100" type="button" data-bs-toggle="collapse" data-bs-target="#totalUsers" aria-expanded="false" aria-controls="totalUsers">
                    <i class="fas fa-users"></i> Total Users
                </button>
                <div id="totalUsers" class="collapse mt-2">
                    <h5 style="font-size: 18px; font-weight: bold;">{{ $totalUsers }}</h5>
                </div>
            </div>

            <!-- Dropdown for Total Bookings -->
            <div class="mb-3">
                <button class="btn btn-success btn-sm w-100" type="button" data-bs-toggle="collapse" data-bs-target="#totalBookings" aria-expanded="false" aria-controls="totalBookings">
                    <i class="fas fa-calendar-alt"></i> Total Bookings
                </button>
                <div id="totalBookings" class="collapse mt-2">
                    <h5 style="font-size: 18px; font-weight: bold;">{{ $totalBookings }}</h5>
                </div>
            </div>

            <!-- Dropdown for Total Revenue -->
            <div class="mb-3">
                <button class="btn btn-warning btn-sm w-100" type="button" data-bs-toggle="collapse" data-bs-target="#totalRevenue" aria-expanded="false" aria-controls="totalRevenue">
                    <i class="fas fa-dollar-sign"></i> Total Revenue
                </button>
                <div id="totalRevenue" class="collapse mt-2">
                    <h5 style="font-size: 18px; font-weight: bold;">${{ number_format($totalRevenue, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Heading for the Chart -->
    <h3 class="mt-4 text-center" style="font-size: 24px; font-weight: bold; color: #333;">
        Weekly Revenue Chart
    </h3>

    <!-- Chart Container -->
    <div class="card mb-4 shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
        <div class="card-body">
            <canvas id="revenueChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Last Activity Tracking -->
    <div class="mt-4 text-muted text-center">
        <small>Last updated: {{ \Carbon\Carbon::now()->diffForHumans() }}</small>
    </div>

</div>

<!-- Include Bootstrap 5 JS and Popper (if not already included in your layout file) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('revenueChart').getContext('2d');

        const revenueData = @json(array_column($revenueData, 'revenue'));
        const labels = @json(array_column($revenueData, 'week'));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Weekly Revenue ($)',
                    data: revenueData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Week'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Revenue ($)'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Revenue: $' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                }
            }
        });
    });
</script>

