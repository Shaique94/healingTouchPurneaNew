<div>
    @if ($showModal)
    <div class="modal-backdrop fade show"></div>
    <div class="modal d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary py-3">
                    <h5 class="modal-title text-white fs-5 fw-semibold">
                    <i class="bi bi-calendar-check-fill me-2"></i>New Patient & Appointment
                    </h5>
                    <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <h6 class="mb-3 text-primary">Patient Information</h6>
                        <div class="row g-3">
                            <!-- All your patient fields -->
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" wire:model="name" placeholder="Enter your full name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" wire:model="email" placeholder="your.email@example.com">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" wire:model="phone" placeholder="Your phone number">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" wire:model="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" wire:model="address" placeholder="Your address">
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Pincode -->
                            <div class="col-md-6">
                                <label class="form-label">Pincode</label>
                                <input type="text" class="form-control" wire:model.lazy="pincode" placeholder="Postal/ZIP code">
                                @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" wire:model="city" placeholder="Your city">
                                @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- State -->
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" wire:model="state" placeholder="Your state/province">
                                @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Country -->
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" wire:model="country" placeholder="Your country">
                                @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- Appointment Section -->
                        <h6 class="my-4 text-primary">Appointment Details</h6>
                        <div class="row g-3">
                            <!-- Select Doctor -->
                            <div class="col-md-6">
                                <label class="form-label">Select Doctor</label>
                                <select class="form-select" wire:model="doctor_id">
                                    <option value="">Select Doctor</option>
                                    @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Appointment Date -->
                            <div class="col-md-6">
                                <label class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" wire:model="appointment_date"
                                    min="{{ now()->toDateString() }}" max="{{ now()->addDay()->toDateString() }}">
                                @error('appointment_date') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Appointment Time -->
                            <div class="col-md-6">
                                <label class="form-label">Appointment Time</label>
                                <input type="time" class="form-control" wire:model="appointment_time">
                                @error('appointment_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Notes -->
                            <div class="col-12">
                                <label class="form-label">Additional Notes</label>
                                <textarea class="form-control" rows="3" wire:model="notes" placeholder="Any additional information for your appointment"></textarea>
                                @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  wire:click="closeModal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Schedule Appointment</button>
                </div>
            </div>
        </div>
    </div>


    @endif
</div>