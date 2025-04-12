<div class="container-fluid mt-4">
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title">👥 Patients</h5>
          <p class="card-text fs-4">{{ $Patients }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title">🩺 Doctors</h5>
          <p class="card-text fs-4">{{ $Doctors }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <h5 class="card-title">📅 Appointments</h5>
          <p class="card-text fs-4">{{ $Appointments }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title">💰 Revenue</h5>
          <p class="card-text fs-4">₹{{ $Revenue }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body p-0">
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
          @forelse ($allAppointments as $index => $appointment)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
            <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
            <td>
              <span class="badge 
                                    @if ($appointment->status == 'Pending') bg-warning 
                                    @elseif ($appointment->status == 'Completed') bg-success 
                                    @elseif ($appointment->status == 'Cancelled') bg-danger 
                                    @else bg-secondary @endif">
                {{ $appointment->status }}
              </span>
            </td>
            <td>
              <button class="btn btn-sm btn-info me-1">
                <i class="bi bi-eye-fill"></i>
              </button>
              <button class="btn btn-sm btn-primary me-1">
                <i class="bi bi-pencil-fill"></i>
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash-fill"></i>
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
    </div>
  </div>
</div>
</div>
</div>