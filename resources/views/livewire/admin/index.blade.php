<!-- Add this at the top to ensure Livewire works properly -->
<div>
    <div class="container-fluid py-4">
        <!-- Stats Cards Row -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="dashboard-card card text-white bg-primary h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon">👥</div>
                        <div>
                            <h6 class="card-title mb-0">Patients</h6>
                            <p class="card-text fs-4">{{ $Patients }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="dashboard-card card text-white bg-success h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon">🩺</div>
                        <div>
                            <h6 class="card-title mb-0">Doctors</h6>
                            <p class="card-text fs-4">{{ $Doctors }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="dashboard-card card text-white bg-warning h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon">📅</div>
                        <div>
                            <h6 class="card-title mb-0">Appointments</h6>
                            <p class="card-text fs-4">{{ $Appointments }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="dashboard-card card text-white bg-danger h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon">💰</div>
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
                <div class="dashboard-card card mb-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>Today's Appointments</h5>
                    </div>
                    
                    <div class="card-body p-0">
                        <!-- Filters -->
                        <div class="p-3">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Search by doctor or patient" wire:model.live="search">
                                </div>
                                <div class="col-md-8">
                                    <div class="d-flex gap-2 flex-wrap">
                                        <select class="form-select" wire:model.live="statusFilter">
                                            <option value="">All Statuses</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <select class="form-select" wire:model.live="doctorFilter">
                                            <option value="">All Doctors</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <button class="btn btn-outline-secondary" wire:click="clearFilters">
                                            <i class="bi bi-x-circle me-1"></i>Clear
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Status Quick Filters -->
                        <div class="px-3 pb-3">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-sm {{ $statusFilter == '' ? 'btn-dark' : 'btn-outline-dark' }}" 
                                        wire:click="clearFilters">
                                    All
                                </button>
                                @foreach($statuses as $status)
                                    <button class="btn btn-sm 
                                        @if($statusFilter == $status)
                                            @if($status == 'Pending') btn-warning
                                            @elseif($status == 'Completed') btn-success
                                            @elseif($status == 'Cancelled') btn-danger
                                            @elseif($status == 'Confirmed') btn-primary
                                            @elseif($status == 'Checked In') btn-info
                                            @else btn-secondary @endif
                                        @else
                                            @if($status == 'Pending') btn-outline-warning
                                            @elseif($status == 'Completed') btn-outline-success
                                            @elseif($status == 'Cancelled') btn-outline-danger
                                            @elseif($status == 'Confirmed') btn-outline-primary
                                            @elseif($status == 'Checked In') btn-outline-info
                                            @else btn-outline-secondary @endif
                                        @endif"
                                        wire:click="filterByStatus('{{ $status }}')">
                                        {{ $status }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Doctor Quick Filters - only show if there are 5 or fewer doctors -->
                        @if(count($doctors) <= 5)
                        <div class="px-3 pb-3">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-sm {{ $doctorFilter == '' ? 'btn-dark' : 'btn-outline-dark' }}" 
                                        wire:click="$set('doctorFilter', '')">
                                    All Doctors
                                </button>
                                @foreach($doctors as $doctor)
                                    <button class="btn btn-sm {{ $doctorFilter == $doctor->id ? 'btn-success' : 'btn-outline-success' }}" 
                                            wire:click="filterByDoctor('{{ $doctor->id }}')">
                                        {{ $doctor->user->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <!-- Appointment Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center mb-0">
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
                                    @forelse ($allAppointments as $index => $appointment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-start">
                                            <a href="#" class="text-decoration-none" wire:click.prevent="filterByDoctor('{{ $appointment->doctor->id }}')">
                                                {{ $appointment->doctor->user->name ?? 'N/A' }}
                                            </a>
                                        </td>
                                        <td class="text-start">{{ $appointment->patient->name ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                        <td>
                                            <span class="badge status-badge 
                                                @if ($appointment->status == 'Pending') bg-warning
                                                @elseif ($appointment->status == 'Completed') bg-success
                                                @elseif ($appointment->status == 'Cancelled') bg-danger
                                                @elseif ($appointment->status == 'Confirmed') bg-primary
                                                @elseif ($appointment->status == 'Checked In') bg-info
                                                @else bg-secondary @endif"
                                                style="cursor: pointer;"
                                                wire:click="filterByStatus('{{ $appointment->status }}')">
                                                {{ $appointment->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info action-btn" title="View">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary action-btn" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger action-btn" title="Delete">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-muted py-4">
                                            <div class="text-center">
                                                <i class="bi bi-calendar-x fs-2 d-block mb-2"></i>
                                                @if($search || $statusFilter || $doctorFilter)
                                                    No appointments found matching your filters.
                                                    <div class="mt-2">
                                                        <button class="btn btn-sm btn-outline-primary" wire:click="clearFilters">
                                                            Clear all filters
                                                        </button>
                                                    </div>
                                                @else
                                                    No appointments found for today.
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Results Information -->
                        @if(count($allAppointments) > 0)
                        <div class="p-3 bg-light border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted">
                                <small>
                                    Showing {{ count($allAppointments) }} 
                                    {{ count($allAppointments) == 1 ? 'appointment' : 'appointments' }}
                                    @if($search || $statusFilter || $doctorFilter)
                                        with applied filters
                                    @else
                                        for today
                                    @endif
                                </small>
                            </span>
                            
                            @if($search || $statusFilter || $doctorFilter)
                            <button class="btn btn-sm btn-outline-secondary" wire:click="clearFilters">
                                <i class="bi bi-x-circle me-1"></i>Clear filters
                            </button>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Right Sidebar -->
            <div class="col-lg-4">
                <!-- Available Doctors -->
                <div class="dashboard-card card mb-4">
                    <div class="card-header bg-success text-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-person-check-fill me-2"></i>Available Doctors Today</h5>
                        @if(count($availableDoctors) > 0)
                        <span class="badge bg-light text-success">{{ count($availableDoctors) }}</span>
                        @endif
                    </div>
                    
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse ($availableDoctors as $doctor)
                                <li class="list-group-item doctor-item d-flex justify-content-between align-items-center py-3" 
                                    style="cursor: pointer;" 
                                    wire:click="filterByDoctor('{{ $doctor->id }}')">
                                    <div>
                                        <h6 class="mb-0">{{ $doctor->user->name }}</h6>
                                        <small class="text-muted">{{ $doctor->specialization }}</small>
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
                
                <!-- Status Overview -->
                <div class="dashboard-card card">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0"><i class="bi bi-graph-up me-2"></i>Status Overview</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                            @php
                                $statusCounts = $allAppointments->groupBy('status')->map->count();
                                $totalAppointments = $allAppointments->count() ?: 1; // Avoid division by zero
                            @endphp
                            
                            @foreach($statuses as $status)
                                @php
                                    $count = $statusCounts->get($status, 0);
                                    $percent = round(($count / $totalAppointments) * 100);
                                    
                                    // Determine color based on status
                                    $color = match($status) {
                                        'Pending' => 'warning',
                                        'Completed' => 'success',
                                        'Cancelled' => 'danger',
                                        'Confirmed' => 'primary',
                                        'Checked In' => 'info',
                                        default => 'secondary'
                                    };
                                @endphp
                                
                                <div style="cursor: pointer;" wire:click="filterByStatus('{{ $status }}')">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-medium">{{ $status }}</span>
                                        <span>{{ $count }} <small class="text-muted">({{ $percent }}%)</small></span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-{{ $color }}" role="progressbar" 
                                            style="width: {{ $percent }}%" 
                                            aria-valuenow="{{ $percent }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>