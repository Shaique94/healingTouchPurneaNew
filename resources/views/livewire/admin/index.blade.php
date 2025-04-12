<div class="container-fluid py-4">
    <!-- Stats Cards Row -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="dashboard-card card h-100 shadow-sm border-0 rounded-4" style="background-color: #4e73df; color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="stats-icon me-3"><i class="bi bi-people-fill fs-2"></i></div>
                    <div>
                        <h6 class="card-title mb-0">Patients</h6>
                        <p class="card-text fs-4">{{ $Patients }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="dashboard-card card h-100 shadow-sm border-0 rounded-4" style="background-color: #1cc88a; color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="stats-icon me-3"><i class="bi bi-heart-pulse-fill fs-2"></i></div>
                    <div>
                        <h6 class="card-title mb-0">Doctors</h6>
                        <p class="card-text fs-4">{{ $Doctors }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="dashboard-card card h-100 shadow-sm border-0 rounded-4" style="background-color: #f6c23e; color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="stats-icon me-3"><i class="bi bi-calendar-check-fill fs-2"></i></div>
                    <div>
                        <h6 class="card-title mb-0">Appointments</h6>
                        <p class="card-text fs-4">{{ $Appointments }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="dashboard-card card h-100 shadow-sm border-0 rounded-4" style="background-color: #e74a3b; color: white;">
                <div class="card-body d-flex align-items-center">
                    <div class="stats-icon me-3"><i class="bi bi-currency-rupee fs-2"></i></div>
                    <div>
                        <h6 class="card-title mb-0">Revenue</h6>
                        <p class="card-text fs-4">₹{{ $Revenue }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row g-4">
        <!-- Appointments Section -->
        <div class="col-lg-8">
            <!-- Quick Actions -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-header py-3" style="background-color: #858796; color: white;">
                    <h5 class="mb-0"><i class="bi bi-lightning-fill me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                            <i class="bi bi-plus-circle me-1"></i> Add Appointment
                        </button>
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                            <i class="bi bi-person-plus-fill me-1"></i> Add Patient
                        </button>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                            <i class="bi bi-heart-pulse-fill me-1"></i> Add Doctor
                        </button>
                    </div>
                </div>
            </div>

            <!-- Today's Appointments -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #4e73df; color: white;">
                    <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Today's Appointments</h5>
                    <button class="btn btn-sm btn-light" wire:click="exportCsv">
                        <i class="bi bi-download me-1"></i> Export CSV
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-3 py-2">#</th>
                                    <th class="px-3 py-2 text-start">Doctor</th>
                                    <th class="px-3 py-2 text-start">Patient</th>
                                    <th class="px-3 py-2">Date</th>
                                    <th class="px-3 py-2">Time</th>
                                    <th class="px-3 py-2">Status</th>
                                    <th class="px-3 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allAppointments as $index => $appointment)
                                <tr>
                                    <td class="px-3">{{ $allAppointments->firstItem() + $index }}</td>
                                    <td class="px-3 text-start">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                                    <td class="px-3 text-start">{{ $appointment->patient->name ?? 'N/A' }}</td>
                                    <td class="px-3">{{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                                    <td class="px-3">{{ Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                    <td class="px-3">
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
                                    <td class="px-3">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-info" title="View" 
                                                    data-bs-toggle="modal" data-bs-target="#viewAppointmentModal">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit" 
                                                    data-bs-toggle="modal" data-bs-target="#editAppointmentModal">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete" 
                                                    wire:click="alertConfirm({{ $appointment->id }})">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
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
                    <div class="p-3 bg-light border-top d-flex justify-content-between align-items-center">
                        <span class="text-muted small">
                            Showing {{ $allAppointments->count() }} of {{ $allAppointments->total() }} 
                            {{ $allAppointments->total() == 1 ? 'appointment' : 'appointments' }}
                        </span>
                        {{ $allAppointments->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4 mt-4">
                <div class="card-header py-3" style="background-color: #f6c23e; color: white;">
                    <h5 class="mb-0"><i class="bi bi-calendar-event-fill me-2"></i>Upcoming Appointments</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($upcomingAppointments as $appointment)
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="mb-0">{{ $appointment->doctor->user->name ?? 'N/A' }} - {{ $appointment->patient->name ?? 'N/A' }}</h6>
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
        <div class="col-lg-4">
            <!-- Notifications -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-header py-3" style="background-color: #e74a3b; color: white;">
                    <h5 class="mb-0"><i class="bi bi-bell-fill me-2"></i>Notifications</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($notifications as $notification)
                        <li class="list-group-item py-3">
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
            <div class="dashboard-card card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-header py-3" style="background-color: #1cc88a; color: white;">
                    <h5 class="mb-0"><i class="bi bi-person-check-fill me-2"></i>Available Doctors Today</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($availableDoctors as $doctor)
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="mb-0">{{ $doctor->user->name }}</h6>
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

            <!-- Patient Demographics -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-header py-3" style="background-color: #36b9cc; color: white;">
                    <h5 class="mb-0"><i class="bi bi-pie-chart-fill me-2"></i>Patient Demographics</h5>
                </div>
                <div class="card-body">
                    <canvas id="demographicsChart" height="150"></canvas>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="dashboard-card card shadow-sm border-0 rounded-4">
                <div class="card-header py-3" style="background-color: #858796; color: white;">
                    <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Recent Activity</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($recentActivities as $activity)
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <span>{{ $activity['action'] }}</span>
                                <small class="d-block text-muted">{{ Carbon\Carbon::parse($activity['time'])->diffForHumans() }}</small>
                            </div>
                            <i class="bi bi-activity text-primary"></i>
                        </li>
                        @empty
                        <li class="list-group-item text-center py-4">
                            <i class="bi bi-hourglass-split fs-2 d-block mb-2 text-muted"></i>
                            <span class="text-muted">No recent activity</span>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
    // Ensure Chart.js is loaded and chart renders after Livewire updates
    document.addEventListener('livewire:navigated', function () {
        const ctx = document.getElementById('demographicsChart');
        if (ctx) {
            // Destroy existing chart if it exists to prevent duplicates
            if (window.demographicsChart instanceof Chart) {
                window.demographicsChart.destroy();
            }

            try {
                window.demographicsChart = new Chart(ctx.getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Male', 'Female', 'Other'],
                        datasets: [{
                            data: [{{ $demographics['Male'] }}, {{ $demographics['Female'] }}, {{ $demographics['Other'] }}],
                            backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e'],
                            borderColor: '#ffffff',
                            borderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                enabled: true
                            }
                        },
                        maintainAspectRatio: false,
                    }
                });
            } catch (error) {
                console.error('Chart.js error:', error);
            }
        }
    });

    // SweetAlert2 for delete confirmation
    window.addEventListener('swal:confirm', event => {
        Swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete', event.detail.appointmentId)
            }
        })
    });
</script>
@endscript

@push('styles')
<style>
    .dashboard-card {
        transition: transform 0.2s;
    }
    .dashboard-card:hover {
        transform: translateY(-2px);
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }
    .btn-group .btn {
        padding: 0.4rem 0.8rem;
    }
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.85em;
    }
    .list-group-item {
        border-left: 0;
        border-right: 0;
    }
    .progress {
        background-color: #e9ecef;
    }
    #demographicsChart {
        max-height: 200px;
    }
</style>
@endpush