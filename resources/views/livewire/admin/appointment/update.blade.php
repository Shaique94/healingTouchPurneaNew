<div>
    <!-- Modal Header -->
    <div class="modal-header bg-primary py-3 px-2">
        <h5 class="modal-title text-white fs-5 fw-semibold p-2">
            <i class="bi bi-calendar-check-fill me-2"></i>Update Patient & Appointment
        </h5>
    </div>

    <!-- Modal Body -->
    <div class="modal-body p-2">
        <form wire:submit.prevent="update">
            <!-- Patient Information Section -->
            <h6 class="mb-3 text-primary fw-bold border-bottom pb-1">
                <i class="bi bi-person-fill me-1"></i> Patient Information
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model="name" placeholder="Enter full name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" wire:model="email" placeholder="your.email@example.com">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" wire:model="phone" placeholder="Your phone number">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Age</label>
                    <input type="text" class="form-control" wire:model="age" placeholder="Your age">
                    @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" wire:model="address" placeholder="Your address">
                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pincode</label>
                    <input type="number" class="form-control" wire:model.lazy="pincode" placeholder="Postal/ZIP code">
                    @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" wire:model="city" placeholder="Your city">
                    @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control" wire:model="state" placeholder="Your state/province">
                    @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" wire:model="country" placeholder="Your country">
                    @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <!-- Appointment Details Section -->
            <h6 class="my-4 text-primary fw-bold border-bottom pb-1">
                <i class="bi bi-clock-fill me-1"></i> Appointment Details
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Select Doctor <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="doctor_id">
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Appointment Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" wire:model="appointment_date"
                           min="{{ now()->toDateString() }}" max="{{ now()->addDay()->toDateString() }}">
                    @error('appointment_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Appointment Time <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" wire:model="appointment_time">
                    @error('appointment_time') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Additional Notes</label>
                    <textarea class="form-control" rows="3" wire:model="notes" placeholder="Any additional information"></textarea>
                    @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Footer -->
    <div class="modal-footer d-flex gap-2">

        <button type="button" class="btn btn-primary d-flex align-items-center" wire:click="update" wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save">
                <i class="bi bi-calendar-plus me-1"></i> Update Appointment
            </span>
            <span wire:loading wire:target="update">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                updating...
            </span>
        </button>
    </div>
</div>
