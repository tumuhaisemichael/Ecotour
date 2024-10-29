<div class="container mb-4">
    <h2 class="text-center">Payments</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Booking ID</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Transaction Reference</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->booking_id }}</td>
                        <td>{{ ucfirst($payment->payment_method) }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>
                            <span class="badge 
                                {{ $payment->status === 'completed' ? 'bg-success' : ($payment->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td>{{ $payment->transaction_reference ?? 'N/A' }}</td>
                        <td>{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
