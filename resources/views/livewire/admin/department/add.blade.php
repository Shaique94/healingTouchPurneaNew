<div>
    <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-hidden="true"  #x-data
            x-on:close-modal.window="() => {
                const modal = bootstrap.Modal.getInstance($el);
                if (modal) modal.hide();
            }"
            wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white"><i class="bi bi-building-fill"></i> Add New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: '#fffff';"></button>

                </div>
                <div class="modal-body p-4">
                    <form wire:submit.prevent="store">
                        <!-- Department Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">
                                <i class="bi bi-tag-fill text-primary"></i> Department Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" wire:model.live="name" id="title" placeholder="Enter Department Title">
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                       

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">
                                <i class="bi bi-toggle-on"></i> Status
                            </label>
                            <select class="form-select" wire:model.live="status" id="status">
                                <option value="null" disabled>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Department Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">
                                <i class="bi bi-textarea-t"></i> Description
                            </label>
                            <textarea class="form-control" wire:model.live="description" id="description" rows="3" placeholder="Enter Department Description"></textarea>
                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
