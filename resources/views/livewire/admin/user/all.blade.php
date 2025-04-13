<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">User List</h5>
            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#userModal">
                <i class="bi bi-plus-circle me-1"></i> Add User
            </button>
        </div>
        <div class="card-body">
            <!-- Search -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search users...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Registered At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user )
                        <tr>
                            <td>{{ $key + 1  }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td><span class="badge bg-secondary">Admin</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2025-04-01</td>
                            <td> 
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateuserModal" wire:click="$dispatch('update-user',{id:{{ $user->id }}})" ><i class="bi bi-pencil-square" ></i></button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <livewire:admin.User.add/>
                <livewire:admin.User.update/>
            </div>
        </div>
    </div>
</div>