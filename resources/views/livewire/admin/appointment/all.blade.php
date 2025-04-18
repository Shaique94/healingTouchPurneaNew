<div>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Appointments</h5>
        </div>

        <div class="card-body p-0">
            <!-- Filters -->
            <div class="p-3">
                <!-- Search and Filter Grid -->
                <div class="row g-3">
                    <!-- Search Input -->
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" 
                                class="form-control border-start-0" 
                                placeholder="Search doctor or patient..." 
                                wire:model.live.debounce.300ms="search"
                                wire:loading.class="opacity-50">
                        </div>
                    </div>

                    <!-- Date Filter -->
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-calendar-range"></i>
                            </span>
                            <input type="text" 
                                id="dateRangePicker" 
                                class="form-control"
                                placeholder="Select date range"
                                wire:loading.class="opacity-50">
                        </div>
                    </div>

                    <!-- Quick Date Filters -->
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-sm @if($showToday) btn-primary @else btn-outline-primary @endif flex-fill" 
                                wire:click="showTodayAppointments"
                                wire:loading.attr="disabled">
                                <i class="bi bi-calendar-check me-1"></i> Today
                            </button>
                            <button class="btn btn-sm @if($showTomorrow) btn-primary @else btn-outline-primary @endif flex-fill" 
                                wire:click="showTomorrowAppointments"
                                wire:loading.attr="disabled">
                                <i class="bi bi-calendar-plus me-1"></i> Tomorrow
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <!-- Export Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" 
                                type="button" 
                                wire:click="toggleDropdown"
                                wire:loading.attr="disabled">
                                <i class="bi bi-download me-1"></i> Export
                            </button>
                            @if ($openDropdown)
                            <ul class="dropdown-menu show">
                                <li>
                                    <a href="#" wire:click="export" class="dropdown-item position-relative">
                                        <i class="bi bi-file-earmark-excel me-1 text-success"></i> Excel
                                        <span wire:loading wire:target="export" class="spinner-border spinner-border-sm float-end" role="status" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" wire:click="exportPdf" class="dropdown-item position-relative">
                                        <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF
                                        <span wire:loading wire:target="exportPdf" class="spinner-border spinner-border-sm float-end" role="status" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                            @endif
                        </div>

                        <!-- New Appointment Button -->
                        <button type="button" 
                            class="btn btn-primary btn-sm" 
                            wire:navigate 
                            href="{{ route('admin.appointment.add') }}">
                            <i class="bi bi-plus-circle me-1"></i> New Appointment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Loading Indicator -->
            <div wire:loading.delay class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
                <div class="toast show bg-light" role="alert">
                    <div class="toast-body d-flex align-items-center">
                        <span class="spinner-border spinner-border-sm me-2"></span>
                        Loading...
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="table-responsive" wire:loading.class="opacity-50">
                <table class="table table-hover table-bordered mb-0 align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $index => $appointment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                            <td>
                                @if ($appointment->status != 'checked_in')
                                <select class="form-select form-select-sm" wire:change="updateStatus({{ $appointment->id }}, $event.target.value)">
                                    @php
                                    $statuses = ['pending', 'confirmed', 'cancelled'];
                                    @endphp
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status }}" @selected($appointment->status === $status)>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                                    @endforeach
                                </select>
                                @else
                                <span class="text-success">Checked In</span>
                                @endif
                            </td>
                            <td>
                                @if ($appointment->payment?->status === 'paid')
                                <span class="badge bg-success">Paid</span>
                                @elseif ($appointment->payment?->status === 'due')
                                <span class="badge bg-danger text-white">Due</span>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary me-1" 
                                        href="{{ route('admin.appointment.update', ['id' => $appointment->id]) }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning me-1" wire:click="$dispatch('open-payment',{id:{{ $appointment->id }}})">
                                        <i class="bi bi-currency-rupee"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-muted">No appointments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <livewire:admin.appointment.payment />
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:navigated', function() {
        flatpickr("#dateRangePicker", {
            mode: "range",
            dateFormat: "Y-m-d",
            onClose: function(selectedDates, dateStr) {
                let dates = dateStr.split(" to ");
                if (dates.length === 2) {
                    @this.set('startDate', dates[0]);
                    @this.set('endDate', dates[1]);
                } else if (dates.length === 1) {
                    @this.set('startDate', dates[0]);
                    @this.set('endDate', dates[0]);
                }
            }
        });
    });
</script>
</div>