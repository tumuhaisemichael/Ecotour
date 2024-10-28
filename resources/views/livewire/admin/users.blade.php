<div>
    <div class="start">
        <button class="btn btn-primary my-3" wire:click="addUser">Add User</button>

        <h2 class="text-center mb-4">Users</h2>
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