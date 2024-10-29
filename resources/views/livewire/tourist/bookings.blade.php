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
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
                                                <span class="badge badge-{{ $booking->payment_status == 'paid' ? 'success' : ($booking->payment_status == 'pending' ? 'warning' : 'danger') }}">
                                                    {{ ucfirst($booking->payment_status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('tourist.booking-details', $booking->experience->id) }}" class="btn btn-info btn-sm">Details</a>
                                                <a href="{{ route('tourist.write-review', $booking->experience->id) }}" class="btn btn-secondary btn-sm">Review</a>
                                                @if($booking->payment_status == 'pending')
                                                    <button wire:click="openPaymentModal({{ $booking->id }})" class="btn btn-warning btn-sm">Pay</button>
                                                @else
                                                    <span class="text-success">Paid</span>
                                                @endif
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

        <!-- Payment Method Modal -->
        <div wire:ignore.self class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Select Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select wire:model="paymentMethod" class="form-control">
                            <option value="">Select Payment Method</option>
                            <option value="paypal">PayPal</option>
                            <option value="mobile_money">Mobile Money</option>
                            <option value="credit_card">Credit Card</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="initiatePayment" class="btn btn-primary">Confirm Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('showPaymentModal', () => {
            $('#paymentModal').modal('show');
        });

        Livewire.on('hidePaymentModal', () => {
            $('#paymentModal').modal('hide');
        });
    });
</script>

