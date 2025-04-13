<div class="container-fluid">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

        <!-- Card Header -->
        <div class="card-header p-2">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                <!-- Title -->
                <h5 class="mb-0 fw-semibold d-flex align-items-center">
                    <i class="bi bi-award-fill me-2"></i>Qualification Management
                </h5>

                <!-- Right Side: Search, Filter, Add Button -->
                <div class="d-flex col-4  align-items-center gap-2">

                    <!-- Search Field -->
                    <div class="input-group input-group-sm" style="max-width: 250px;">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="searchTerm"
                            placeholder="Search qualifications..."
                            class="form-control border-start-0" />
                    </div>



                    <!-- Add Qualification Button -->
                    <button
                        class="btn btn-sm btn-primary d-flex justify-content-center align-items-center gap-2"
                        data-bs-toggle="modal"
                        data-bs-target="#QualificationModal"
                        @click="$dispatch('add-Qualification')">
                        <i class="bi bi-plus-circle"></i>
                        <span class="d-none d-sm-inline">Add Qualification</span>
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
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">Qualification</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3">Description</th>
                            <th class="fw-semibold text-muted small text-uppercase px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($qualifications as $index => $qualification)
                        <tr class="align-middle">
                            <td class="px-4">{{ $qualifications->firstItem() + $index }}</td>
                            <td class="px-4 fw-medium">{{ $qualification->name }}</td>
                            <td class="px-4 text-muted">{{ Str::limit($qualification->description, 50) }}</td>
                            <td class="px-4 text-center">
                                <div class="btn-group" role="group">
                                    <button
                                        class="btn btn-sm btn-outline-primary"
                                        wire:click="$dispatch('update-qual', { id: {{ $qualification->id }} })"
                                        data-bs-toggle="modal"
                                        data-bs-target="#UpdateQualificationModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        wire:click="alertConfirm({{ $qualification->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                No qualifications found
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
            {{ $qualifications->links() }}
        </div>
    </div>

    <!-- Livewire Modals -->
    <livewire:admin.qualification.add />
    <livewire:admin.qualification.update />

    <!-- SweetAlert Confirmation -->
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
                    @this.call('delete', event.detail.qualId)
                }
            })
        });
    </script>
    @endscript

    @push('styles')
    <style>
        .card-header.bg-gradient-primary {
            background: linear-gradient(45deg, #4e73df, #224abe) !important;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-group .btn {
            padding: 0.4rem 0.8rem;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.03);
        }

        .card-header .input-group {
            min-width: 200px;
        }

        .card-header .btn {
            white-space: nowrap;
        }
    </style>
    @endpush
</div>