<div>
    @if($showModal)
    <div class="modal-backdrop fade show"></div>
    <div class="modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
            <div class="modal-content shadow-lg border-0">
                <form wire:submit.prevent="updateDoctor">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="doctorModalLabel">
                            <i class="bi bi-person-plus-fill me-2"></i>Update Doctor
                        </h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body px-4 py-3">
                        <div class="row g-3">

                            {{-- Doctor Name --}}
                            <div class="col-md-6">
                                <label class="form-label" for="name">Doctor Name</label>
                                <input type="text" wire:model="name" id="name" class="form-control" placeholder="Enter doctor's name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" wire:model="email" id="email" class="form-control" placeholder="Enter email address">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Department --}}
                            <div class="col-md-6">
                                <label class="form-label" for="dept_id">Department</label>
                                <select wire:model="dept_id" id="dept_id" class="form-select">
                                    <option value="">Select Department</option>
                                    @foreach ($department as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                    @endforeach
                                </select>
                                @error('dept_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" wire:model="phone" id="phone" class="form-control" placeholder="Enter phone number">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Available Days --}}
                            <div class="col-12">
                                <label class="form-label d-block mb-2">Available Days</label>

                                <div class="d-flex flex-wrap gap-3">
                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" wire:model="available_days" value="{{ $day }}" id="day-{{ $day }}">
                                        <label class="form-check-label" for="day-{{ $day }}">{{ $day }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @error('available_days') <small class="text-danger d-block">{{ $message }}</small> @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="col-md-6">
                                <label class="form-label" for="image">Doctor Image</label>
                                <input type="file" wire:model="newImage" id="image" class="form-control" accept="image/*">
                                @error('newImage') <small class="text-danger">{{ $message }}</small> @enderror

                                {{-- Image Preview --}}
                                @if ($newImage)
                                <div class="mt-3">
                                    <p class="fw-bold mb-1">New Preview:</p>
                                    <img src="{{ $newImage->temporaryUrl() }}" class="img-fluid rounded border shadow-sm" style="max-height: 180px;">
                                </div>
                                @elseif (is_string($image))
                                <div class="mt-3">
                                    <p class="fw-bold mb-1">Current Image:</p>
                                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded border shadow-sm" style="max-height: 180px;">
                                </div>
                                @endif
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <select wire:model="status" id="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-patch-check-fill me-1"></i>Qualifications
                            </label>
                            <div class="d-flex flex-wrap gap-2">
                                <input type="text" wire:model="qualification" class="form-control">
                                @error('qualification') <small class="text-danger d-block">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="modal-footer bg-light rounded-bottom-4">
                            <button type="button" class="btn btn-outline-secondary me-2" wire:click="closeModal">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Update Doctor
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>