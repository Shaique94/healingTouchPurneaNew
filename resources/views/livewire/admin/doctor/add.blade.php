<div>
    @if($showModal)
    <div class="modal-backdrop fade show"></div>
    <div class="modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
            <div class="modal-content shadow-lg border-0">
                <form wire:submit.prevent="saveDoctor">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="doctorModalLabel">
                            <i class="bi bi-person-plus-fill me-2"></i>Add Doctor
                        </h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body bg-light">
                        <div class="card p-4 border-0 shadow-sm">
                            <div class="row g-3">

                                {{-- Doctor Name --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="name">
                                        <i class="bi bi-person-fill me-1"></i>Doctor Name
                                    </label>
                                    <input type="text" wire:model.live="name" id="name" class="form-control" placeholder="Enter doctor's name">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="email">
                                        <i class="bi bi-envelope-fill me-1"></i>Email
                                    </label>
                                    <input type="email" wire:model="email" id="email" class="form-control" placeholder="Enter email">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="password">
                                        <i class="bi bi-key-fill me-1"></i>Password
                                    </label>
                                    <input type="password" wire:model="password" id="password" class="form-control" placeholder="Enter password">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Department --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="dept_id">
                                        <i class="bi bi-building me-1"></i>Department
                                    </label>
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
                                    <label class="form-label fw-semibold" for="phone">
                                        <i class="bi bi-telephone-fill me-1"></i>Phone
                                    </label>
                                    <input type="number" wire:model="phone" id="phone" class="form-control" placeholder="Enter phone number">
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Available Days --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-calendar-week me-1"></i>Available Days
                                    </label>

                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" wire:model="available_days" value="{{ $day }}" id="day-{{ $day }}">
                                            <label class="form-check-label" for="day-{{ $day }}">{{ $day }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @error('available_days') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- Doctor Image --}}
                                <div class="col-6">
                                    <label class="form-label fw-semibold" for="image">
                                        <i class="bi bi-image-fill me-1"></i>Doctor Image
                                    </label>
                                    <input type="file" wire:model="image" id="image" class="form-control" accept="image/*">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror

                                    <div wire:loading wire:target="image" class="mt-2">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Uploading...</span>
                                        </div>
                                        <span class="ms-2">Uploading...</span>
                                    </div>

                                    @if ($image)
                                    <div class="mt-3">
                                        <p class="fw-bold">Preview:</p>
                                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded border" style="max-height: 200px;">
                                    </div>
                                    @endif
                                </div>
                                {{-- Doctor Fee --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="fee">
                                        <i class="bi bi-currency-rupee me-1"></i>Consultation Fee
                                    </label>
                                    <input type="number" wire:model="fee" id="fee" class="form-control" placeholder="Enter fee amount">
                                    @error('fee') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Description --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="description">
                                        <i class="bi bi-file-text-fill me-1"></i>Description
                                    </label>
                                    <textarea wire:model="description" id="description" class="form-control" rows="3" 
                                        placeholder="Enter doctor's description, specializations, or any additional information"></textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="status">
                                        <i class="bi bi-toggle-on me-1"></i>Status
                                    </label>
                                    <select wire:model="status" id="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        <option value="2">Disabled</option>
                                    </select>
                                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                {{-- Qualifications --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-patch-check-fill me-1"></i>Qualifications
                                    </label>
                                    <input type="text" wire:model="qualification" class="form-control" placeholder="Enter qualifications">
                                    @error('qualification') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Footer --}}
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">
                            <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save2-fill"></i> Submit
                        </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    @endif
</div>