<div>
@if($showModal)
<div class="modal-backdrop fade show"></div>
<div class="modal d-block" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary py-3">
                <h5 class="modal-title text-white fs-5 fw-semibold">
                    <i class="bi bi-building-fill me-2"></i>Add New Department
                </h5>
                <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
            </div>

            <div class="modal-body p-4">
                <form wire:submit.prevent="store" class="needs-validation" novalidate>
                    <!-- Department Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">
                            <i class="bi bi-tag-fill text-primary me-1"></i> Department Title <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg shadow-sm" wire:model.live="name" id="title" placeholder="Enter Department Title">
                        @error('name') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">
                            <i class="bi bi-toggle-on text-primary me-1"></i> Status
                        </label>
                        <select class="form-select form-select-lg shadow-sm" wire:model.live="status" id="status">
                            <option value="null" disabled>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">
                            <i class="bi bi-textarea-t text-primary me-1"></i> Description
                        </label>
                        <textarea class="form-control shadow-sm" wire:model.live="description" id="description" rows="4" placeholder="Enter Department Description"></textarea>
                        @error('description') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-end gap-2 mt-4">
                        <button type="button" class="btn btn-outline-secondary order-2 order-sm-1" wire:click="closeModal">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary order-1 order-sm-2">
                            <i class="bi bi-save me-1"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
</div>