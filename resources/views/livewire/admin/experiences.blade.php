<div>
    <div class="container mt-4">
        <!-- Success message -->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <!-- Form to create a new experience -->
        <form wire:submit.prevent="submit" class="mb-4">
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" wire:model="title" class="form-control"
                    placeholder="Enter experience title">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" wire:model="description" class="form-control"
                    placeholder="Enter experience description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" wire:model="price" class="form-control" placeholder="Enter price">
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" wire:model="category" class="form-select">
                    <option value="">Select category</option>
                    <option value="homestay">Homestay</option>
                    <option value="cultural_tour">Cultural Tour</option>
                    <option value="workshop">Workshop</option>
                </select>
                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" id="location" wire:model="location" class="form-control"
                    placeholder="Enter location">
                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="available_dates" class="form-label">Available Dates (JSON format)</label>
                <input type="text" id="available_dates" wire:model="available_dates" class="form-control"
                    placeholder="Enter available dates">
                @error('available_dates') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Create Experience</button>
        </form>

        <hr>

        <!-- Display the list of experiences -->
        <h3 class="mb-4">Your Experiences</h3>
        @if($experiences->isEmpty())
        <p class="text-muted">No experiences found.</p>
        @else
        <ul class="list-group">
            @foreach($experiences as $experience)
            <li class="list-group-item">
                <strong>{{ $experience->title }}</strong><br>
                <span class="text-muted">{{ $experience->description }}</span><br>
                <small class="text-muted">{{ $experience->location }}</small><br>
                <strong>Price:</strong> ${{ $experience->price }}<br>
                <strong>Category:</strong> {{ ucfirst($experience->category) }}
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>