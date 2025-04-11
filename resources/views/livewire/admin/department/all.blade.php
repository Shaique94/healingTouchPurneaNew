<div>
    <div class="card shadow border-0 rounded-4">
        <!-- Card Header -->
        <div class="card-header bg-white border-0 p-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <h5 class="fw-semibold text-primary mb-0">
                <i class="bi bi-diagram-3-fill me-2 text-primary"></i>Department List
            </h5>
            <div class="d-flex gap-2 w-100 w-md-auto">
                <!-- <input
                    type="text"
                    wire:model.live="searchTerm"
                    placeholder="Search Department..."
                    class="form-control form-control-sm rounded-pill border shadow-sm"
                    style="max-width: 280px;" /> -->

                <button
                    class="btn btn-sm btn-primary d-flex align-items-center gap-2 rounded-pill shadow-sm px-3"
                    data-bs-toggle="modal"
                    data-bs-target="#addDepartmentModal"
                    @click="$dispatch('add-Department')">
                    <i class="bi bi-plus-circle"></i> <span class="d-none d-sm-inline">Add Department</span>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-muted text-uppercase small fw-bold">#</th>
                            <th class="text-muted text-uppercase small fw-bold">Title</th>
                            <th class="text-muted text-uppercase small fw-bold">Description</th>
                            <th class="text-muted text-uppercase small fw-bold">Status</th>
                            <th class="text-muted text-uppercase small fw-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $key => $department)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$department->name}}</td>
                            <td>{{ $department->description }}</td>
                            <td class="text-right">
                                <div class="form-check form-switch d-flex">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="statusSwitch{{ $department->id }}"
                                        wire:click="updateStatus({{ $department->id }})"
                                        wire:loading.attr="disabled"
                                        @if ($department->status) checked @endif
                                    >
                                </div>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary" wire:click="$dispatch('update-department', { id: {{ $department->id }} })" data-bs-toggle="modal" data-bs-target="#updateDepartmentModal"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" wire:click="alertConfirm({{ $department->id }})"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white border-0 d-flex justify-content-end p-3">
            {{-- {{ $departments->links() }} --}}
        </div>

        <!-- Livewire Modals -->
        <livewire:admin.department.add />
        <livewire:admin.department.update/>
    </div>

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
                    return @this.call('delete', event.detail.departmentId)
                }
            })
        });
    </script>
    @endscript
</div>