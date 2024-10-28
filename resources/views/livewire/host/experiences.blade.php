<div>
    <div class="container mt-4">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <button class="btn btn-primary mb-4" wire:click="create">
            Create Experience
        </button>

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
                        <th>Available Dates</th>
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
                            @if($experience->available_dates)
                            <div class="small">
                                @foreach($experience->available_dates as $date)
                                <span
                                    class="badge bg-info me-1">{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</span>
                                @endforeach
                            </div>
                            @endif
                        </td>
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

            @if($modalMode)
            <div class="modal fade show d-block" tabindex="-1"
                style="background-color: rgba(0,0,0,.5); overflow-y: auto;">
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
                                <input type="number" step="0.01" id="price" wire:model="price" class="form-control">
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
                                    <input type="file" id="photo" wire:model="photo" class="form-control"
                                        accept="image/*">
                                    @if($photo || $existingPhoto)
                                    <button class="btn btn-outline-secondary" type="button"
                                        wire:click="$set('photo', null)">Clear</button>
                                    @endif
                                </div>
                                <div wire:loading wire:target="photo" class="text-primary mt-2">Uploading...</div>
                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror

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
                                <label for="available_dates">Available Dates</label>
                                <div class="input-group">
                                    <input type="text" id="available_dates" wire:model="available_dates_raw" x-data
                                        x-init="
                                                let picker = flatpickr($el, {
                                                    mode: 'multiple',
                                                    dateFormat: 'Y-m-d',
                                                    minDate: 'today',
                                                    enableTime: false,
                                                    conjunction: ' · ',
                                                    static: true,
                                                    defaultDate: $wire.available_dates_raw || [],
                                                    onChange: function(selectedDates, dateStr) {
                                                        $wire.set('available_dates_raw', selectedDates.map(date =>
                                                            date.toISOString().split('T')[0]
                                                        ));
                                                    }
                                                });

                                                $wire.on('resetFlatpickr', () => {
                                                    picker.clear();
                                                });

                                                $wire.on('updateFlatpickrDates', ({dates}) => {
                                                    if (Array.isArray(dates)) {
                                                        picker.setDate(dates);
                                                    }
                                                });
                                            " class="form-control" placeholder="Click to select dates" readonly>
                                    <button class="btn btn-outline-secondary" type="button"
                                        wire:click="$set('available_dates_raw', [])">
                                        Clear
                                    </button>
                                </div>
                                <div class="form-text">Click to select multiple dates. Selected dates will appear here.
                                </div>
                                @error('available_dates_raw') <span class="text-danger">{{ $message }}</span> @enderror

                                @if(!empty($available_dates_raw) && is_array($available_dates_raw))
                                <div class="mt-2">
                                    <div class="selected-dates">
                                        @foreach($available_dates_raw as $date)
                                        <span class="badge bg-info me-1">
                                            {{ \Carbon\Carbon::parse($date)->format('M d, Y') }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
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

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('updateFlatpickrDates', ({
            dates
        }) => {
            const input = document.getElementById('available_dates');
            if (input && input._flatpickr) {
                input._flatpickr.setDate(dates);
            }
        });
    });
    </script>
    @endpush