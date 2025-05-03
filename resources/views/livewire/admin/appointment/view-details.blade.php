<div>
    @if($openModal)
    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block; overflow-y: auto;">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-calendar2-check me-2"></i>Appointment Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" wire:click="$set('openModal', false)"></button>
                </div>

                <div class="modal-body p-4">
                    <!-- Hospital Header -->
                    <div class="text-center mb-4 position-relative">
                        @if ($appointment?->payment?->status == 'paid')
                            <div class="position-absolute top-0 end-0">
                                <span class="badge bg-success">PAID</span>
                            </div>
                        @endif
                        <img src="{{ asset('healingTouchLogo.jpeg') }}" class="rounded-circle mb-2" style="width: 80px;">
                        <h4 class="mb-1">HealingTouch Hospital</h4>
                        <small class="text-muted">Excellence in Healthcare</small>
                        <div class="mt-2">
                            <span class="badge bg-primary">Ref: HTH-{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>

                    <!-- Barcode & Appointment Number -->
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="row align-items-center">
                                <div class="col-md-6 border-end">
                                    <small class="text-muted d-block mb-1">Appointment Number</small>
                                    <h5 class="mb-0 font-monospace">{{ $appointment->appointment_no }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted d-block mb-2">Scan Barcode</small>
                                    @if($appointment->barcode_path)
                                        <img src="{{ Storage::url($appointment->barcode_path) }}" 
                                             alt="Appointment Barcode"
                                             class="img-fluid"
                                             style="max-height: 50px;">
                                    @else
                                        <p class="small text-muted">Barcode not available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Patient Information -->
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="bi bi-person me-2"></i>Patient Information</h6>
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4">Name</dt>
                                        <dd class="col-sm-8">{{ $appointment->patient->name }}</dd>

                                        <dt class="col-sm-4">Patient ID</dt>
                                        <dd class="col-sm-8">#{{ $appointment->patient->id }}</dd>

                                        <dt class="col-sm-4">Gender</dt>
                                        <dd class="col-sm-8">{{ ucfirst($appointment->patient->gender) }}</dd>

                                        <dt class="col-sm-4">Contact</dt>
                                        <dd class="col-sm-8">{{ $appointment->patient->phone }}</dd>

                                        <dt class="col-sm-4">Notes</dt>
                                        <dd class="col-sm-8">{{ $appointment->notes }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Appointment Details -->
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Appointment Details</h6>
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4">Doctor</dt>
                                        <dd class="col-sm-8">{{ $appointment->doctor->user->name }}</dd>

                                        <dt class="col-sm-4">Department</dt>
                                        <dd class="col-sm-8">{{ $appointment->doctor->department->name }}</dd>

                                        <dt class="col-sm-4">Fee</dt>
                                        <dd class="col-sm-8">₹{{ number_format($appointment->doctor->fee ?? 0, 2) }}</dd>

                                        <dt class="col-sm-4">Date & Time</dt>
                                        <dd class="col-sm-8">
                                            {{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                                            <small class="text-muted">
                                               ({{ Carbon\Carbon::parse($appointment->appointment_date)->format('l') }})
                                            </small>
                                            <br>
                                            <span class="badge bg-info">
                                                {{ Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                            </span>
                                        </dd>

                                        <dt class="col-sm-4">Queue No.</dt>
                                        <dd class="col-sm-8">
                                            <span class="badge bg-secondary">
                                                #{{ str_pad($appointment->queue_number ?? 1, 3, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

               
            </div>
        </div>
    </div>
    <!-- Separate backdrop -->
    <div class="modal-backdrop fade show" style="opacity: 0.5;"></div>
    @endif

    <style>
        body.modal-open {
            overflow: hidden;
            padding-right: 17px; /* Prevent shift */
        }
        .modal {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeModal', () => {
                document.body.classList.remove('modal-open');
            });
        });

        // Add modal-open class when modal shows
        if(@this.openModal) {
            document.body.classList.add('modal-open');
        }
    </script>
</div>