<div>
    <div class="container mt-4">
        <!-- Success message -->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <!-- Create Experience Button (opens modal) -->
        <button class="btn btn-primary mb-4" wire:click="create">
            Create Experience
        </button>

        <!-- Experience Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experiences as $experience)
                <tr>
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->description }}</td>
                    <td>${{ $experience->price }}</td>
                    <td>{{ ucfirst($experience->category) }}</td>
                    <td>{{ $experience->location }}</td>
                    <td>
                        <button class="btn btn-sm btn-success" wire:click="edit({{ $experience->id }})">Edit</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $experience->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Bootstrap Modal for Create/Edit -->
        @if($modalMode)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $experience_id ? 'Edit Experience' : 'Create Experience' }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('modalMode', false)"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" id="title" wire:model="title" class="form-control">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" wire:model="description" class="form-control"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" id="price" wire:model="price" class="form-control">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <select id="category" wire:model="category" class="form-select">
                                <option value="">Select category</option>
                                <option value="homestay">Homestay</option>
                                <option value="cultural_tour">Cultural Tour</option>
                                <option value="workshop">Workshop</option>
                            </select>
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" id="location" wire:model="location" class="form-control">
                            @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="available_dates">Available Dates (JSON format)</label>
                            <input type="text" id="available_dates" wire:model="available_dates" class="form-control">
                            @error('available_dates') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            wire:click="$set('modalMode', false)">Close</button>
                        <button type="button" class="btn btn-primary"
                            wire:click="{{ $experience_id ? 'update' : 'store' }}">
                            {{ $experience_id ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>