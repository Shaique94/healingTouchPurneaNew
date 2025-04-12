<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Appointments</h5>
    </div>

    <div class="card-body p-0">
        <!-- Filters -->
        <div class="d-flex justify-content-between mb-3 p-3">
            <!-- Search Input -->
            <input type="text" class="form-control w-25" placeholder="Search by doctor or patient" wire:model.live.debounce.300s="search">

            <!-- Date Range Filters -->
            <div class="d-flex gap-2">
                <input type="text" id="dateRangePicker" class="form-control form-control-sm" style="width: 200px;" placeholder="YYYY-MM-DD → YYYY-MM-DD">
                <button class="btn btn-sm btn-outline-secondary" wire:click="showTodayAppointments">Today</button>
                <button class="btn btn-sm btn-outline-secondary" wire:click="clearDateFilter">Clear</button>
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
                            <select class="form-select form-select-sm" wire:change="updateStatus({{ $appointment->id }}, $event.target.value)">
                                @php
                                $statuses = ['pending', 'checked_in', 'confirmed', 'cancelled'];
                                @endphp
                                @foreach ($statuses as $status)
                                <option value="{{ $status }}" @selected($appointment->status === $status)>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info me-1"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-sm btn-primary me-1"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-muted">No appointments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
        document.addEventListener('livewire:navigated', function() {
            // Date Range Picker for Wallet History
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