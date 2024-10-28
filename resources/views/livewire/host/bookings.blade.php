@php use Carbon\Carbon; @endphp
<div>
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button wire:click="createBooking" class="btn btn-primary">
                Create New Booking
            </button>
        </div>

        <h2 class="text-center mb-4">Bookings</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Tourist</th>
                    <th>Experience</th>
                    <th>Booking Date</th>
                    <th>Scheduled Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->tourist->name }}</td>
                        <td>{{ $booking->experience->title }}</td>
                        <td>{{ Carbon::parse($booking->booking_date)->format('M d, Y H:i') }}</td>
                        <td>{{ Carbon::parse($booking->scheduled_date)->format('M d, Y H:i') }}</td>
                        <td>${{ number_format($booking->total_amount, 2) }}</td>
                        <td>
                            <span
                                class="badge bg-{{ $booking->payment_status === 'paid' ? 'success' : ($booking->payment_status === 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>
                        <td>
                            <button wire:click="editBooking({{ $booking->id }})" class="btn btn-sm btn-info">
                                Edit
                            </button>
                            <button wire:click="deleteBooking({{ $booking->id }})" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $bookings->links() }}

        <!-- Bootstrap Modal -->
        <div class="modal fade show" tabindex="-1" style="display: {{ $showModal ? 'block' : 'none' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $editMode ? 'Edit Booking' : 'Create Booking' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label class="form-label">Tourist</label>
                                <select wire:model="tourist_id"
                                        class="form-select @error('tourist_id') is-invalid @enderror">
                                    <option value="">Select Tourist</option>
                                    @foreach($tourists as $tourist)
                                        <option value="{{ $tourist->id }}">{{ $tourist->name }}</option>
                                    @endforeach
                                </select>
                                @error('tourist_id')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <select wire:model="experience_id"
                                        class="form-select @error('experience_id') is-invalid @enderror">
                                    <option value="">Select Experience</option>
                                    @foreach($experiences as $experience)
                                        <option value="{{ $experience->id }}">{{ $experience->title }}</option>
                                    @endforeach
                                </select>
                                @error('experience_id')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Booking Date</label>
                                <input type="datetime-local" wire:model="booking_date"
                                       class="form-control @error('booking_date') is-invalid @enderror">
                                @error('booking_date')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Scheduled Date</label>
                                <input type="datetime-local" wire:model="scheduled_date"
                                       class="form-control @error('scheduled_date') is-invalid @enderror">
                                @error('scheduled_date')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total Amount</label>
                                <input type="number" step="0.01" wire:model="total_amount"
                                       class="form-control @error('total_amount') is-invalid @enderror">
                                @error('total_amount')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Payment Status</label>
                                <select wire:model="payment_status"
                                        class="form-select @error('payment_status') is-invalid @enderror">
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                @error('payment_status')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ $editMode ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Backdrop -->
        @if($showModal)
            <div class="modal-backdrop fade show"></div>
        @endif
    </div>
</div>
