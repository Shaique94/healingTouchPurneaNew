<div class="container-fluid">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <!-- Card Header -->
     <!-- Card Header -->
<div class="card-header p-2">
<div class="row align-items-center gy-2">
    <!-- Title Section -->
    <div class="col-md-6 d-flex align-items-center">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-diagram-3-fill me-2"></i>Department Management
        </h5>
    </div>

    <!-- Control Section -->
    <div class="col-md-6 d-flex flex-wrap justify-content-md-end gap-2">
        <!-- Search Input -->
        <div class="input-group input-group-sm" style="max-width: 250px;">
            <span class="input-group-text bg-white">
                <i class="bi bi-search"></i>
            </span>
            <input
                type="text"
                wire:model.live.debounce.300ms="searchTerm"
                placeholder="Search departments..."
                class="form-control border-start-0"
            />
        </div>

        <!-- Status Filter -->
        <select 
            wire:model.live="statusFilter"
            class="form-select form-select-sm"
            style="width: 120px;"
        >
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <!-- Add Button -->
        <button
            class="btn btn-sm btn-primary d-flex align-items-center gap-1"
            data-bs-toggle="modal"
            data-bs-target="#addDepartmentModal"
            @click="$dispatch('add-Department')"
        >
            <i class="bi bi-plus-circle"></i>
            <span class="d-none d-sm-inline">Add Department</span>
        </button>
    </div>
</div>

</div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">#</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">Department</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">Description</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">Status</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $key => $department)
                        <tr class="align-middle">
                            <td class="px-4">{{ $departments->firstItem() + $key }}</td>
                            <td class="px-4 fw-medium">{{ $department->name }}</td>
                            <td class="px-4 text-muted">{{ Str::limit($department->description, 50) }}</td>
                            <td class="px-4">
                                <span class="form-check form-switch mb-0">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        wire:click="updateStatus({{ $department->id }})"
                                        wire:loading.attr="disabled"
                                        @if ($department->status) checked @endif
                                    >
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="btn-group" role="group">
                                    <button 
                                        class="btn btn-sm btn-outline-primary"
                                        wire:click="$dispatch('update-department', { id: {{ $department->id }} })"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateDepartmentModal"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button 
                                        class="btn btn-sm btn-outline-danger"
                                        wire:click="alertConfirm({{ $department->id }})"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No departments found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer -->
        <div class="card-footer bg-white border-0 p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">Show</span>
                <select wire:model.live="perPage" class="form-select form-select-sm" style="width: 70px;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <span class="text-muted small">entries</span>
            </div>
            {{ $departments->links('vendor.livewire.bootstrap') }}
        </div>
    </div>

    <!-- Livewire Modals -->
    <livewire:admin.department.add />
    <livewire:admin.department.update />

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
                    @this.call('delete', event.detail.departmentId)
                }
            })
        });
    </script>
    @endscript
</div>

@push('styles')
<style>
    .card-header.bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe) !important;
    }
    
    .table th, .table td {
        vertical-align: middle;
    }
    
    .btn-group .btn {
        padding: 0.4rem 0.8rem;
    }
    
    .form-check-input:checked {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }
</style>
@endpush