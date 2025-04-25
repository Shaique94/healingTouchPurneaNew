<div>
    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Doctor List</h4>
        <button type="button" class="btn btn-primary" wire:click="$dispatch('open-add-doctor')">
            <i class="bi bi-plus-circle me-1"></i> Add Doctor
        </button>
    </div>

    <!-- Filters -->
    <div class="d-flex flex-column flex-md-row gap-2 mb-3">
        <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Search name or email...">
        <select wire:model.live="perPage" class="form-select" style="width: auto">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
        </select>
    </div>

    <!-- Doctor Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th class="d-none d-md-table-cell">Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th class="d-none d-lg-table-cell">Phone</th>
                    <th class="d-none d-xl-table-cell">Available Days</th>
                    <th>Fee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doc)
                <tr>
                    <td class="text-center">
                        <img src="{{ $doc->image ? asset('storage/' . $doc->image) : asset('images/default.jpg') }}" 
                             class="img-thumbnail" alt="Doctor Image"
                             style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>{{ $doc->user->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $doc->user->email }}</td>
                    <td>{{ $doc->department->name ?? '-' }}</td>
                    <td class="text-center" style="min-width: 120px;">
                        <div class="status-select-wrapper">
                            <select
                                class="form-select form-select-sm status-select"
                                wire:model.live="doctors.{{ $loop->index }}.status"
                                wire:change="updateStatus({{ $doc->id }}, $event.target.value)"
                                wire:loading.attr="disabled"
                            >
                                <option value="1" @if($doc->status === 1) selected @endif>Active</option>
                                <option value="0" @if($doc->status === 0) selected @endif>Inactive</option>
                                <option value="2" @if($doc->status === 2) selected @endif>Disabled</option>
                            </select>
                        </div>
                    </td>
                    <td class="d-none d-lg-table-cell">{{ $doc->user->phone }}</td>
                    <td class="d-none d-xl-table-cell">{{ is_array($doc->available_days) ? implode(', ', $doc->available_days) : '-' }}</td>
                    <td>₹{{ $doc->fee }}</td>
                    <td class="text-center">
                        <div class="d-flex gap-1 justify-content-center">
                            <button wire:click="$dispatch('update-doctor', { id: {{ $doc->id }} })" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#UpdatedoctorModal" 
                                    class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button wire:click="alertConfirm({{ $doc->id }})" 
                                    class="btn btn-sm btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No doctors found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $doctors->links('vendor.livewire.bootstrap') }}
        </div>
    </div>

    <!-- Doctor Add/Edit Modals -->
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
                    @this.call('delete', event.detail.doctorId)
                }
            })
        });
    </script>
    @endscript
  

    <style>
        .cursor-pointer {
            cursor: pointer;
        }
        
        .status-select-wrapper {
            position: relative;
        }
        
        .status-select {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
            width: 100%;
            min-width: 100px;
            background-color: #fff;
        }
        
        .status-select option {
            padding: 8px;
            font-size: 0.875rem;
        }
        
        @media (max-width: 768px) {
            .table-responsive {
                border: 0;
            }
            
            .table td, .table th {
                padding: 0.5rem;
            }
            
            .btn-sm {
                padding: 0.25rem 0.4rem;
            }
        }
    </style>
</div>
