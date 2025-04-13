<div>
    <!-- User Modal -->
    <div class="modal fade" id="UpdateuserModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true" x-data
        x-on:close-modal.window="() => { const modal = bootstrap.Modal.getInstance($el); if (modal) modal.hide(); }"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userModalLabel">Add / Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <input type="text" class="form-control" wire:model.defer="user.phone" placeholder="+917894561234">
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
                                <option value="reception">Reception</option>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="update">Save User</button>
                </div>
            </div>
        </div>
    </div>

</div>