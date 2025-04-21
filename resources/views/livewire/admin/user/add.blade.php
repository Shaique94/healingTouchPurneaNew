<div>
    @if($showModal)
    <div class="modal-backdrop fade show"></div>
    <div class="modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userModalLabel">Add User</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" wire:model.defer="user.name" placeholder="Sam">
                            @error('user.name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" wire:model.defer="user.email" placeholder="saum@gmail.com">
                            @error('user.email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" wire:model.defer="user.phone" placeholder="+917894561234">
                            @error('user.phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select class="form-select" wire:model.defer="user.role">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="staff">Staff</option>
                                <option value="reception">Receptioner</option>
                            </select>
                            @error('user.role') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" wire:model.defer="user.status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('user.status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Password (optional) -->
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model.defer="user.password" placeholder="Set new password">
                            @error('user.password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="closeModal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Save User</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>