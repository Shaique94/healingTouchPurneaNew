<div>
    <!-- Modal Header -->
    <div class="modal-header bg-primary py-3 px-2">
        <h5 class="modal-title text-white fs-5 fw-semibold p-2">
            <i class="bi bi-calendar-check-fill me-2"></i>New Patient & Appointment (नया मरीज और अपॉइंटमेंट)
        </h5>
    </div>

    <!-- Modal Body -->
    <div class="modal-body p-2">
        <form wire:submit.prevent="save">
            <!-- Patient Information Section -->
            <h6 class="mb-3 text-primary fw-bold border-bottom pb-1">
                <i class="bi bi-person-fill me-1"></i> Patient Information (मरीज की जानकारी)
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Full Name (पूरा नाम) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model="name" placeholder="Enter full name">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address (ईमेल पता)</label>
                    <input type="email" class="form-control" wire:model="email" placeholder="your.email@example.com">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number (फोन नंबर) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" wire:model="phone" placeholder="Your phone number">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender (लिंग) <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="gender">
                        <option value="">Select Gender (लिंग चुनें)</option>
                        <option value="male">Male (पुरुष)</option>
                        <option value="female">Female (महिला)</option>
                        <option value="other">Other (अन्य)</option>
                    </select>
                    @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Age (उम्र)</label>
                    <input type="number" class="form-control" wire:model="age" placeholder="Enter age" min="0" max="150">
                    @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Address (पता)</label>
                    <input type="text" class="form-control" wire:model="address" placeholder="Your address">
                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pincode (पिनकोड)</label>
                    <input type="number" class="form-control" wire:model.lazy="pincode" placeholder="Postal/ZIP code">
                    @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">City (शहर)</label>
                    <input type="text" class="form-control" wire:model="city" placeholder="Your city">
                    @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">State (राज्य)</label>
                    <input type="text" class="form-control" wire:model="state" placeholder="Your state/province">
                    @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Country (देश)</label>
                    <input type="text" class="form-control" wire:model="country" placeholder="Your country">
                    @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <!-- Appointment Details Section -->
            <h6 class="my-4 text-primary fw-bold border-bottom pb-1">
                <i class="bi bi-clock-fill me-1"></i> Appointment Details (अपॉइंटमेंट विवरण)
            </h6>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Select Doctor (डॉक्टर चुनें) <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="doctor_id">
                        <option value="">Select Doctor (डॉक्टर चुनें)</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Appointment Date (अपॉइंटमेंट तारीख) <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" wire:model="appointment_date"
                           min="{{ now()->toDateString() }}" max="{{ now()->addDay()->toDateString() }}">
                    @error('appointment_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Appointment Time (अपॉइंटमेंट समय) <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" wire:model="appointment_time">
                    @error('appointment_time') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Additional Notes (अतिरिक्त नोट्स)</label>
                    <textarea class="form-control" rows="3" wire:model="notes" placeholder="Any additional information"></textarea>
                    @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Footer -->
    <div class="modal-footer d-flex gap-2">
        <button type="button" class="btn btn-primary d-flex align-items-center" wire:click="save" wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save">
                <i class="bi bi-calendar-plus me-1"></i> Schedule Appointment (अपॉइंटमेंट शेड्यूल करें)
            </span>
            <span wire:loading wire:target="save">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                Scheduling... (शेड्यूलिंग...)
            </span>
        </button>
    </div>
</div>