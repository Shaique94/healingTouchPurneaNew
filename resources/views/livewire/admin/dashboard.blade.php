<div>
    <div class="container-fluid py-3 py-md-4">
        <!-- Stats Cards Row -->
        <div class="row g-2 g-md-3 mb-3 mb-md-4">
            <!-- Patient Card -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="dashboard-card card h-100 shadow-sm border-0 rounded-3 rounded-md-4" style="background-color: #4e73df; color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-2 me-md-3"><i class="bi bi-people-fill fs-3"></i></div>
                        <div>
                            <h6 class="card-title mb-0 fs-6">Patients</h6>
                            <p class="card-text fs-5 fw-bold mb-0">{{ $Patients }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Doctors Card -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="dashboard-card card h-100 shadow-sm border-0 rounded-3 rounded-md-4" style="background-color: #1cc88a; color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-2 me-md-3"><i class="bi bi-heart-pulse-fill fs-3"></i></div>
                        <div>
                            <h6 class="card-title mb-0 fs-6">Doctors</h6>
                            <p class="card-text fs-5 fw-bold mb-0">{{ $Doctors }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Appointments Card -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="dashboard-card card h-100 shadow-sm border-0 rounded-3 rounded-md-4" style="background-color: #f6c23e; color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-2 me-md-3"><i class="bi bi-calendar-check-fill fs-3"></i></div>
                        <div>
                            <h6 class="card-title mb-0 fs-6">Appointments</h6>
                            <p class="card-text fs-5 fw-bold mb-0">{{ $Appointments }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Card -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="dashboard-card card h-100 shadow-sm border-0 rounded-3 rounded-md-4" style="background-color: #e74a3b; color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-2 me-md-3"><i class="bi bi-currency-rupee fs-3"></i></div>
                        <div class="w-100">
                            <h6 class="card-title mb-0 fs-6">Revenue</h6>
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="btn btn-sm btn-dark text-white mt-1" wire:click="showRevenue">
                                    {{ $hideRevenue ? 'Hide' : 'Show' }}
                                </button>
                                @if ($hideRevenue)
                                <p class="card-text fs-5 fw-bold mb-0">₹{{ $Revenue }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row g-3 g-lg-4">
            <!-- Appointments Section -->
            <div class="col-12 col-lg-8">
                <!-- Quick Actions -->
                <div class="dashboard-card card shadow-sm border-0 rounded-3 mb-3">
                    <div class="card-header py-2 py-md-3" style="background-color: #858796; color: white;">
                        <h5 class="mb-0 fs-6 fs-md-5"><i class="bi bi-lightning-fill me-2"></i>Quick Actions</h5>
                    </div>
                    <div class="card-body py-2 py-md-3">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-sm btn-primary" wire:navigate  href="{{ route('admin.appointment.add') }}">
                                <i class="bi bi-plus-circle me-1"></i><span class="d-none d-sm-inline">Add</span> Appointment
                            </button>
                            <button class="btn btn-sm btn-success" wire:click="$dispatch('open-add-user')">
                                <i class="bi bi-person-plus-fill me-1" ></i><span class="d-none d-sm-inline">Add</span> User
                            </button>
                            <button class="btn btn-sm btn-info" wire:click="$dispatch('open-add-doctor')">
                                <i class="bi bi-heart-pulse-fill me-1"></i><span class="d-none d-sm-inline">Add</span> Doctor
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Today's Appointments -->
                <div class="dashboard-card card shadow-sm border-0 rounded-3 mb-3">
                    <div class="card-header py-2 py-md-3 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2" style="background-color: #4e73df; color: white;">
                        <h5 class="mb-0 fs-6 fs-md-5"><i class="bi bi-calendar-check-fill me-2"></i>Today's Appointments</h5>
                        <button class="btn btn-sm btn-light" wire:click="exportCsv">
                            <i class="bi bi-download me-1"></i> Export CSV
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-2 py-2">#</th>
                                        <th class="px-2 py-2 text-start">Doctor</th>
                                        <th class="px-2 py-2 text-start">Patient</th>
                                        <th class="px-2 py-2">Date</th>
                                        <th class="px-2 py-2">Time</th>
                                        <th class="px-2 py-2">Status</th>
                                        <th class="px-2 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allAppointments as $index => $appointment)
                                    <tr>
                                        <td class="px-2">{{ $allAppointments->firstItem() + $index }}</td>
                                        <td class="px-2 text-start">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                                        <td class="px-2 text-start">{{ $appointment->patient->name ?? 'N/A' }}</td>
                                        <td class="px-2">{{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                                        <td class="px-2">{{ Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                        <td class="px-2">
                                            <span class="badge 
                                            @if ($appointment->status == 'Pending') bg-warning
                                            @elseif ($appointment->status == 'Completed') bg-success
                                            @elseif ($appointment->status == 'Cancelled') bg-danger
                                            @elseif ($appointment->status == 'Confirmed') bg-primary
                                            @elseif ($appointment->status == 'Checked In') bg-info
                                            @else bg-secondary @endif">
                                                {{ $appointment->status }}
                                            </span>
                                        </td>
                                        <td class="px-2">
                                            <button class="btn btn-sm btn-outline-info" title="Print Appointment" wire:click="printPdf({{ $appointment->id }})">
                                                <i class="bi bi-eye-fill"></i><span class="d-none d-md-inline"> Print</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-muted py-4">
                                            <div class="text-center">
                                                <i class="bi bi-calendar-x fs-2 d-block mb-2"></i>
                                                No appointments found for today.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2 p-md-3 bg-light border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                            <span class="text-muted small">
                                Showing {{ $allAppointments->count() }} of {{ $allAppointments->total() }}
                                {{ $allAppointments->total() == 1 ? 'appointment' : 'appointments' }}
                            </span>
                            <div class="pagination-container">
                                {{ $allAppointments->links('vendor.livewire.bootstrap') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="dashboard-card card shadow-sm border-0 rounded-3">
                    <div class="card-header py-2 py-md-3" style="background-color: #f6c23e; color: white;">
                        <h5 class="mb-0 fs-6 fs-md-5"><i class="bi bi-calendar-event-fill me-2"></i>Upcoming Appointments</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse ($upcomingAppointments as $appointment)
                            <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center py-2 py-md-3 gap-2">
                                <div>
                                    <h6 class="mb-1 fs-6">{{ $appointment->doctor->user->name ?? 'N/A' }} - {{ $appointment->patient->name ?? 'N/A' }}</h6>
                                    <small class="text-muted">
                                        {{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }} at
                                        {{ Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                                    </small>
                                </div>
                                <span class="badge 
                                @if ($appointment->status == 'Pending') bg-warning
                                @elseif ($appointment->status == 'Completed') bg-success
                                @elseif ($appointment->status == 'Cancelled') bg-danger
                                @elseif ($appointment->status == 'Confirmed') bg-primary
                                @elseif ($appointment->status == 'Checked In') bg-info
                                @else bg-secondary @endif">
                                    {{ $appointment->status }}
                                </span>
                            </li>
                            @empty
                            <li class="list-group-item text-center py-4">
                                <i class="bi bi-calendar-x fs-2 d-block mb-2 text-muted"></i>
                                <span class="text-muted">No upcoming appointments</span>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-12 col-lg-4">
                <!-- Notifications -->
                <div class="dashboard-card card shadow-sm border-0 rounded-3 mb-3">
                    <div class="card-header py-2 py-md-3" style="background-color: #e74a3b; color: white;">
                        <h5 class="mb-0 fs-6 fs-md-5"><i class="bi bi-bell-fill me-2"></i>Notifications</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse ($notifications as $notification)
                            <li class="list-group-item py-2 py-md-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill me-2 
                                    @if ($notification['type'] == 'warning') text-warning
                                    @elseif ($notification['type'] == 'info') text-info
                                    @elseif ($notification['type'] == 'primary') text-primary
                                    @elseif ($notification['type'] == 'danger') text-danger
                                    @else text-secondary @endif"></i>
                                    <span>{{ $notification['message'] }}</span>
                                </div>
                            </li>
                            @empty
                            <li class="list-group-item text-center py-4">
                                <i class="bi bi-bell-slash fs-2 d-block mb-2 text-muted"></i>
                                <span class="text-muted">No new notifications</span>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Available Doctors -->
                <div class="dashboard-card card shadow-sm border-0 rounded-3">
                    <div class="card-header py-2 py-md-3" style="background-color: #1cc88a; color: white;">
                        <h5 class="mb-0 fs-6 fs-md-5"><i class="bi bi-person-check-fill me-2"></i>Available Doctors Today</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse ($availableDoctors as $doctor)
                            <li class="list-group-item d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center py-2 py-md-3 gap-2">
                                <div>
                                    <h6 class="mb-1 fs-6">{{ $doctor->user->name }}</h6>
                                    <small class="text-muted">{{ $doctor->specialization ?? 'N/A' }}</small>
                                </div>
                                <span class="badge bg-success rounded-pill">Available</span>
                            </li>
                            @empty
                            <li class="list-group-item text-center py-4">
                                <i class="bi bi-emoji-frown fs-2 d-block mb-2 text-muted"></i>
                                <span class="text-muted">No doctors available today</span>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <livewire:admin.doctor.add/>
        <livewire:admin.user.add/>
    </div>

    <style>
        .dashboard-card {
            transition: transform 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
        }

        .table th,
        .table td {
            vertical-align: middle;
            font-size: 0.9rem;
        }

        @media (max-width: 767.98px) {
            .table th,
            .table td {
                font-size: 0.8rem;
                padding: 0.4rem 0.5rem;
            }
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.03);
        }

        .btn-group .btn {
            padding: 0.25rem 0.5rem;
        }

        .badge {
            padding: 0.4em 0.6em;
            font-size: 0.75em;
        }

        .list-group-item {
            border-left: 0;
            border-right: 0;
        }

        /* Pagination Responsive Styles */
        .pagination-container nav div:first-child {
            display: none;
        }

        .pagination-container ul.pagination {
            margin-bottom: 0;
            justify-content: center;
        }

        @media (max-width: 575.98px) {
            .pagination-container ul.pagination .page-item .page-link {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>

</div>