<div>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Appointments</h5>
        </div>

        <div class="card-body p-0">
            <div class="p-3">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-12 col-lg-4">
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
                    <div class="col-12 col-lg-4">
                        <div class="d-flex gap-2 flex-column flex-sm-row">
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

                    <!-- Time Slot Filter -->
                    <div class="col-12 col-lg-2">
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-clock"></i>
                            </span>
                            <select class="form-select" wire:model.live="selectedTimeSlot">
                                <option value="">All Time Slots</option>
                                @foreach ($this->getTimeSlots() as $slot)
                                    <option value="{{ $slot }}">{{ Carbon\Carbon::createFromFormat('H:i', $slot)->format('h:i A') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <!-- Export and Add -->
                     <div class="col-12 col-lg-2">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                        wire:click="toggleDropdown" wire:loading.attr="disabled">
                                    <i class="bi bi-download me-1"></i> Export
                                </button>
                                @if ($openDropdown)
                                <ul class="dropdown-menu show">
                                    <li>
                                        <a wire:navigate  href="#" wire:click.prevent="export" class="dropdown-item position-relative">
                                            <i class="bi bi-file-earmark-excel me-1 text-success"></i> Excel
                                            <span wire:loading wire:target="export" class="spinner-border spinner-border-sm float-end"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a wire:navigate  href="#" wire:click.prevent="exportPdf" class="dropdown-item position-relative">
                                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF
                                            <span wire:loading wire:target="exportPdf" class="spinner-border spinner-border-sm float-end"></span>
                                        </a>
                                    </li>
                                </ul>
                                @endif
                            </div>

                           
                        </div>
                    </div>
                    <!-- Quick Filters + Clear -->
                    <div class="col-lg-6 ">
                       
                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                            <a wire:navigate  href="{{ route('admin.appointment.add') }}" class="btn btn-primary btn-sm" wire:navigate>
                                <i class="bi bi-plus-circle me-1"></i> New Appointment
                            </a>
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

                   
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive-xl">
                <div class="overflow-x-auto min-vh-50" style="max-height: 600px;">
                    <table class="table table-hover table-bordered mb-0 align-middle text-center">
                        <thead class="table-light sticky-top">
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
                                <td class="text-nowrap">{{ $index + 1 }}</td>
                                <td class="text-nowrap">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                                <td class="text-nowrap">{{ $appointment->patient->name ?? 'N/A' }}</td>
                                <td class="text-nowrap">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                                <td class="text-nowrap">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                                <td class="text-nowrap">
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
                                <td class="text-nowrap">
                                    @if ($appointment->payment?->status === 'paid')
                                        <span class="badge bg-success">Paid</span>
                                    @elseif ($appointment->payment?->status === 'due')
                                        <span class="badge bg-danger text-white">Due</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">
                                        <button class="btn btn-sm btn-info" 
                                                wire:click="$dispatch('viewDetails',{id:{{ $appointment->id }}})">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a class="btn btn-sm btn-primary"
                                           href="{{ route('admin.appointment.update', ['id' => $appointment->id]) }}">
                                           <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button class="btn btn-sm btn-warning"
                                                wire:click="$dispatch('open-payment',{id:{{ $appointment->id }}})">
                                           <i class="bi bi-currency-rupee"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info position-relative"
                                                wire:click="printPdf({{ $appointment->id }})"
                                                wire:loading.attr="disabled"
                                                wire:target="printPdf({{ $appointment->id }})">
                                           <i class="bi bi-printer" wire:loading.remove wire:target="printPdf({{ $appointment->id }})"></i>
                                           <span class="spinner-border spinner-border-sm" wire:loading wire:target="printPdf({{ $appointment->id }})"></span>
                                           <span class="d-none d-md-inline"> Print</span>
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
                </div>
                <livewire:admin.appointment.payment/>
                <livewire:admin.appointment.view-details/>
            </div>
        </div>
    </div>
</div>
