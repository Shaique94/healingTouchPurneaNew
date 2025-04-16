<div>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Appointments</h5>
        </div>

        <div class="card-body p-0">
            <!-- Filters -->
            <div class="d-flex flex-wrap justify-content-between gap-2 mb-3 p-3">
                <!-- Search Input -->
                <div class="flex-grow-1" style="min-width: 220px;">
                    <input type="text" class="form-control w-100" placeholder="Search by doctor or patient" wire:model.live.debounce.300s="search">
                </div>
                <div class="position-relative d-inline-block" wire:transition>
                    <button class="btn btn-success btn-sm position-relative" type="button" wire:click="toggleDropdown">
                        <i class="bi bi-download me-1"></i> Export
                    </button>

                    @if ($openDropdown)
                    <ul class="dropdown-menu show" style="position: absolute; will-change: transform; top: 100%; left: 0; margin-top: .3rem;">
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


                <input type="text" id="dateRangePicker" class="form-control form-control-sm" style="width: 200px; min-width: 160px;" placeholder="YYYY-MM-DD → YYYY-MM-DD">
                <button class="btn btn-sm btn-outline-secondary" wire:click="showTodayAppointments">Today</button>
                <button class="btn btn-sm btn-outline-secondary" wire:click="clearDateFilter">Clear</button>
                <button type="button" class="btn btn-primary btn-sm" wire:click="$dispatch('open-add-appoinment')">
                    New Patient & Appointment
                </button>
            </div>
        </div>

        <!-- Appointment Table -->
        <div class="table-responsive">
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
                            <span class="badge bg-warning text-dark">Due</span>
                            @endif
                        </td>

                        <td>
                            <button class="btn btn-sm btn-primary me-1" wire:click="$dispatch('update-appointment',{id:{{ $appointment->id }}})">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="btn btn-sm btn-warning me-1" wire:click="$dispatch('open-payment',{id:{{ $appointment->id }}})">
                                <i class="bi bi-currency-rupee"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-muted">No appointments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <livewire:admin.appointment.add />
            <livewire:admin.appointment.update />
            <livewire:admin.appointment.payment />
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