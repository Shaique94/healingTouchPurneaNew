<div>
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
        <div class="modal d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header bg-primary py-3">
                        <h5 class="modal-title text-white fs-5 fw-semibold">
                            <i class="bi bi-briefcase-fill me-2"></i>{{ $careerId ? 'Edit Career' : 'Add Career' }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <h6 class="mb-3 text-primary">Career Details</h6>
                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-md-6">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="title" placeholder="Enter job title">
                                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <!-- Location -->
                                <div class="col-md-6">
                                    <label class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="location" placeholder="Enter job location">
                                    @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <!-- Salary -->
                                <div class="col-md-6">
                                    <label class="form-label">Salary</label>
                                    <input type="text" class="form-control" wire:model="salary" placeholder="Enter salary (optional)">
                                    @error('salary') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <!-- Description -->
                                <div class="col-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="4" wire:model="description" placeholder="Enter job description"></textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                        <button type="button" class="btn btn-primary" wire:click="save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <div class="content-card overflow-x-auto">
        <h2>Career Management</h2>
        <button class="btn btn-primary mb-3" wire:click="openModal">Add New Job</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($careers as $career)
                    <tr>
                        <td>{{ $career->title }}</td>
                        <td>{{ $career->location }}</td>
                        <td>{{ $career->salary ?: 'N/A' }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    role="switch" 
                                    id="statusToggle{{ $career->id }}"
                                    wire:change="toggleStatus({{ $career->id }})" 
                                    {{ $career->status ? 'checked' : '' }}
                                >
                            </div>
                        </td>
                        <td class="d-flex justify-content-start">
                            <button class="btn btn-sm btn-primary me-1" wire:click="edit({{ $career->id }})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-sm btn-danger me-1" wire:click="delete({{ $career->id }})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No careers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $careers->links('livewire::bootstrap') }}
        </div>
    </div>
</div>