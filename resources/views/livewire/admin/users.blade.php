<div>
    <div class="start">
        <!-- Header with Add User and Search -->
        <div class="d-flex justify-content-between align-items-center my-3">
            <button class="btn btn-primary" wire:click="addUser">Add User</button>
            
            <!-- Search input with button -->
            <div class="d-flex">
                <div class="input-group" style="width: 300px;">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Search users..." 
                        wire:model="searchTerm"
                        wire:keydown.enter="search"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" wire:click="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4">Users</h2>
        
        <!-- Loading indicator -->
        <div wire:loading wire:target="search" class="text-center mb-2">
            <div class="spinner-border spinner-border-sm text-primary" role="status">
                <span class="sr-only">Searching...</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" wire:click="editUser({{ $user->id }})">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('admin.user-form')
</div>