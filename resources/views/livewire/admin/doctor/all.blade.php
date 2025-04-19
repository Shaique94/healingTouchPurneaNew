<div>
    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Doctor List</h4>
        <button type="button" class="btn btn-primary" wire:click="$dispatch('open-add-doctor')">
            <i class="bi bi-plus-circle me-1"></i> Add Doctor
        </button>
    </div>

    <!-- Filters -->
    <div class="d-flex justify-content-between mb-2">
        <input type="text" wire:model.live.debounce.500ms="search" class="form-control w-25" placeholder="Search name or email...">
        <select wire:model.live="perPage" class="form-select w-auto">
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
                    <th wire:click="sortBy('user.name')" class="cursor-pointer">Name</th>
                    <th wire:click="sortBy('user.email')" class="cursor-pointer">Email</th>
                    <th>Department</th>
                    <th wire:click="sortBy('status')" class="cursor-pointer">Status</th>
                    <th>Phone</th>
                    <th>Available Days</th>
                    <th>Fee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doc)
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{ $doc->image ? asset('storage/' . $doc->image) : asset('images/default.jpg') }}" width="60" class="img-thumbnail" alt="Doctor Image">
                    </td>
                    <td>{{ $doc->user->name }}</td>
                    <td>{{ $doc->user->email }}</td>
                    <td>{{ $doc->department->name ?? '-' }}</td>
                    <td>
                        <div class="form-check form-switch d-flex">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                wire:click="updateStatus({{ $doc->id }})"
                                wire:loading.attr="disabled"
                                @if($doc->status) checked @endif
                            >
                        </div>
                    </td>
                    <td>{{ $doc->user->phone }}</td>
                    <td>{{ is_array($doc->available_days) ? implode(', ', $doc->available_days) : '-' }}</td>
                    <td>₹{{ $doc->fee }}</td>
                    <td class="text-center d-flex justify-content-center align-items-center">
                        <button wire:click="$dispatch('update-doctor', { id: {{ $doc->id }} })" data-bs-toggle="modal" data-bs-target="#UpdatedoctorModal" class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button wire:click="alertConfirm({{ $doc->id }})" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash3"></i>
                        </button>
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
    </style>
</div>
