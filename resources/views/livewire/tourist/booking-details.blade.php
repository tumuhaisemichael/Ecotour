<div>
    <div style="height: 25vh;">
        <!-- spacer -->
    </div>
    <div class="container" style="margin-bottom: 5vh;">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <img src="{{ $experience->photo ? Storage::url($experience->photo) : asset('assets/ecotour/img/tour_default.jpg') }}"
                        class="card-img-top" alt="{{ $experience->title }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $experience->title }}</h3>
                        <p class="card-text">{{ $experience->description }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Category:</strong> {{ $experience->category }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $experience->location }}</li>
                            <li class="list-group-item"><strong>Price:</strong>
                                ${{ number_format($experience->price, 2) }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Book This Experience</h4>

                        @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="submitBooking">
                            <div class="mb-3">
                                <label for="bookingDate" class="form-label">Booking Date</label>
                                <input type="date" wire:model="bookingDate"
                                    class="form-control @error('bookingDate') is-invalid @enderror">
                                @error('bookingDate') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="scheduledDate" class="form-label">Scheduled Date</label>
                                <input type="date" wire:model="scheduledDate"
                                    class="form-control @error('scheduledDate') is-invalid @enderror">
                                @error('scheduledDate') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="totalAmount" class="form-label">Total Amount</label>
                                <input type="text" readonly wire:model="totalAmount" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Confirm Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>