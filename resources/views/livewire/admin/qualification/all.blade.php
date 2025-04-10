<div>
    <!-- Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Qualifition List</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#QualificationModal">
            <i class="bi bi-plus-circle me-1"></i> Add Qualification

        </button>
    </div>

    <!-- Table -->
    <!-- Table -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th> <!-- New Column -->
            </tr>
        </thead>
        <tbody>
            @forelse ($qualifications as $index => $qualification)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $qualification->name }}</td>
                <td>{{ $qualification->description }}</td>
                <td>
                    <button wire:click="$dispatch('update-qual',{id:{{ $qualification->id }}})" data-bs-toggle="modal" data-bs-target="#UpdateQualificationModal" class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#QualificationModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button wire:click="alertConfirm({{ $qualification->id }})" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No qualifications found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <livewire:admin.qualification.add />
    <livewire:admin.qualification.update />
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
                    return @this.call('delete', event.detail.qualId)
                }
            })
        });
    </script>
    @endscript
</div>