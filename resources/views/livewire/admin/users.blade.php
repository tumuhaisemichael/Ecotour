<div>
    <div class="users">
        <button class="btn btn-primary my-3" wire:click="addUser">Add User</button>

        <table class="table table-bordered">
            <thead>
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


    @livewire('admin.user-form')
</div>
