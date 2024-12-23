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
        <h2 class="text-center mb-4">Experiences</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Photo</th>
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
                        <td>
                            @if($experience->photo)
                            <img src="{{ Storage::url($experience->photo) }}" alt="{{ $experience->title }}"
                                class="img-thumbnail" style="max-width: 100px;">
                            @else
                            No photo
                            @endif
                        </td>
                        <td>{{ $experience->location }}</td>
                        <td>
                            <button class="btn btn-sm btn-success"
                                wire:click="edit({{ $experience->id }})">Edit</button>
                            <button class="btn btn-sm btn-danger"
                                wire:click="delete({{ $experience->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bootstrap Modal for Create/Edit -->
        @if($modalMode)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,.5);  overflow-y: auto;">
            <div class="modal-dialog modal-dialog-scrollable" style="margin: 1.75rem auto;">
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
                            <label for="photo">Photo</label>
                            <div class="input-group">
                                <input type="file" id="photo" wire:model="photo" class="form-control" accept="image/*">
                                @if($photo || $existingPhoto)
                                <button class="btn btn-outline-secondary" type="button"
                                    wire:click="$set('photo', null)">
                                    Clear
                                </button>
                                @endif
                            </div>
                            <div wire:loading wire:target="photo" class="text-primary mt-2">
                                Uploading...
                            </div>
                            @error('photo') <span class="text-danger">{{ $message }}</span> @enderror

                            <!-- Photo preview -->
                            @if ($photo && !$errors->has('photo'))
                            <div class="mt-2">
                                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail"
                                    style="max-width: 200px; height: auto; object-fit: cover;">
                            </div>
                            @elseif ($experience_id && $existingPhoto)
                            <div class="mt-2">
                                <img src="{{ Storage::url($existingPhoto) }}" class="img-thumbnail"
                                    style="max-width: 200px; height: auto; object-fit: cover;">
                            </div>
                            @endif
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