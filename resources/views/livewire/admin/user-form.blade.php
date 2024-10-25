<div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $userId ? 'Edit User' : 'Add User' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveUser">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" wire:model.defer="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select wire:model.defer="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="host">Host</option>
                            <option value="tourist">Tourist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" wire:model.defer="password" class="form-control" {{ $userId ? '' : 'required' }}>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('js:show-user-modal', event => {
        $('#userModal').modal('show');
    });

    window.addEventListener('js:hide-user-modal', event => {
        $('#userModal').modal('hide');
    });
</script>
