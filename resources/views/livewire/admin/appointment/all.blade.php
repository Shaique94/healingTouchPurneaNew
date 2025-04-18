<div>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Appointments</h5>
        </div>

        <div class="card-body p-0">
            <div class="p-3">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control border-start-0"
                                   placeholder="Search doctor or patient..."
                                   wire:model.live.debounce.300ms="search"
                                   wire:loading.class="opacity-50">
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-2">
                            <div class="input-group">
                                <span class="input-group-text bg-light">From</span>
                                <input type="date" class="form-control"
                                    wire:model.live="startDate"
                                    wire:loading.class="opacity-50">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light">To</span>
                                <input type="date" class="form-control"
                                    wire:model.live="endDate"
                                    wire:loading.class="opacity-50">
                            </div>
                        </div>
                    </div>

                    <!-- Quick Filters + Clear -->
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-sm {{ $showToday ? 'btn-primary' : 'btn-outline-primary' }} flex-fill"
                                    wire:click="applyToday" wire:loading.attr="disabled">
                                <i class="bi bi-calendar-check me-1"></i> Today
                            </button>
                            <button class="btn btn-sm {{ $showTomorrow ? 'btn-primary' : 'btn-outline-primary' }} flex-fill"
                                    wire:click="applyTomorrow" wire:loading.attr="disabled">
                                <i class="bi bi-calendar-plus me-1"></i> Tomorrow
                            </button>
                            <button class="btn btn-sm btn-outline-danger flex-fill"
                                    wire:click="clearDateFilters" wire:loading.attr="disabled">
                                <i class="bi bi-x-circle me-1"></i> Clear
                            </button>
                        </div>
                    </div>

                    <!-- Export and Add -->
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                    wire:click="toggleDropdown" wire:loading.attr="disabled">
                                <i class="bi bi-download me-1"></i> Export
                            </button>
                            @if ($openDropdown)
                            <ul class="dropdown-menu show">
                                <li>
                                    <a href="#" wire:click.prevent="export" class="dropdown-item position-relative">
                                        <i class="bi bi-file-earmark-excel me-1 text-success"></i> Excel
                                        <span wire:loading wire:target="export" class="spinner-border spinner-border-sm float-end"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" wire:click.prevent="exportPdf" class="dropdown-item position-relative">
                                        <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF
                                        <span wire:loading wire:target="exportPdf" class="spinner-border spinner-border-sm float-end"></span>
                                    </a>
                                </li>
                            </ul>
                            @endif
                        </div>

                        <a href="{{ route('admin.appointment.add') }}" class="btn btn-primary btn-sm" wire:navigate>
                            <i class="bi bi-plus-circle me-1"></i> New Appointment
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table -->
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
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                            <td>
                                @if ($appointment->status != 'checked_in')
                                    <select class="form-select form-select-sm"
                                            wire:change="updateStatus({{ $appointment->id }}, $event.target.value)">
                                        @foreach (['pending', 'confirmed', 'cancelled'] as $status)
                                            <option value="{{ $status }}" @selected($appointment->status === $status)>
                                                {{ ucfirst($status) }}
                                            </option>
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
                                <div class="btn-group d-flex gap-2">
                                    <a class="btn btn-sm btn-primary me-1"
                                       href="{{ route('admin.appointment.update', ['id' => $appointment->id]) }}">
                                       <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning me-1"
                                            wire:click="$dispatch('open-payment',{id:{{ $appointment->id }}})">
                                       <i class="bi bi-currency-rupee"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info"
                                            wire:click="printPdf({{ $appointment->id }})">
                                       <i class="bi bi-eye-fill"></i><span class="d-none d-md-inline"> Print</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-muted">No appointments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <livewire:admin.appointment.payment />
            </div>
        </div>
    </div>
</div>
