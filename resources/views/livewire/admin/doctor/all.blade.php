<div>
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Doctor List</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctorModal">
            <i class="bi bi-plus-circle me-1"></i> Add Doctor
        </button>
    </div>

    <!-- Doctor Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Phone</th>
                    <th>Fee</th>
                    <th>Available Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doc)
                <tr>
                    <!-- Doctor Image -->
                    <td class="text-center align-middle">
                        @if ($doc->image)
                        <img src="{{ asset('storage/' . $doc->image) }}" width="60" class="img-thumbnail" alt="Doctor Image">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" width="60" class="img-thumbnail" alt="Default Image">
                        @endif
                    </td>


                    <!-- Basic Info -->
                    <td>{{ $doc->user->name }}</td>
                    <td>{{ $doc->user->email }}</td>
                    <td>{{ $doc->department->name ?? '-' }}</td>
                    <td>
                        <div class="form-check form-switch d-flex">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="statusSwitch{{ $doc->id }}"
                                wire:click="updateStatus({{ $doc->id }})"
                                wire:loading.attr="disabled"
                                @if ($doc->status) checked @endif
                            >
                        </div>
                    </td>
                    <td>{{ $doc->user->phone }}</td>
                    <td>{{ is_array($doc->available_days) ? implode(', ', $doc->available_days) : '-' }}</td>
                    <td>₹{{ $doc->fee }}</td>
                    <!-- Actions -->
                    <td class="text-center">
                        <button  wire:click="$dispatch('update-doctor',{id:{{ $doc->id }}})" data-bs-toggle="modal" data-bs-target="#UpdatedoctorModal" class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button wire:click="alertConfirm({{ $doc->id }})" class="btn btn-sm btn-danger" >
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No doctors found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Doctor Add/Edit Modal -->
    <livewire:admin.doctor.add />
    <livewire:admin.doctor.update />
    @script
    <script>
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
                    return @this.call('delete', event.detail.doctorId)
                }
            })
        });
    </script>
    @endscript
</div>