<div class="container-fluid py-4 px-4 bg-light min-vh-100">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded-3 shadow-sm mb-4">
        <div>
            <h4 class="mb-1">User Management</h4>
            <p class="text-muted mb-0">Manage system users and their roles</p>
        </div>
        <button class="btn btn-primary d-flex align-items-center gap-2" wire:click="$dispatch('open-add-user')">
            <i class="bi bi-person-plus"></i> Add New User
        </button>
    </div>

    <!-- Search & Filters -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control border-start-0 ps-0" 
                       placeholder="Search users by name, email or phone..." 
                       wire:model.live.debounce.300ms="search">
            </div>
        </div>
    </div>

    <!-- Users Grid -->
    <div class="row g-4">
        @foreach($users as $key => $user)
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-initial rounded-circle me-3 
                             {{ $user->isActive ? 'bg-success' : 'bg-secondary' }}">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $user->name }}</h6>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-envelope me-2"></i>
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <div class="row g-2 text-muted small">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone me-2"></i>
                                    {{ $user->phone }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shield-check me-2"></i>
                                    <span class="badge bg-primary-subtle text-primary">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="bi bi-clock me-1"></i>
                            {{ $user->created_at->format('d M Y') }}
                        </small>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-primary" 
                                    wire:click="$dispatch('update-user',{id:{{ $user->id }}})">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" 
                                    wire:click="alertConfirm({{ $user->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <livewire:admin.User.add />
    <livewire:admin.User.update />

    <style>
        .hover-card {
            transition: transform 0.2s ease;
        }
        .hover-card:hover {
            transform: translateY(-3px);
        }
        .avatar-initial {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
    </style>

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
                    @this.call('delete', event.detail.userId)
                }
            })
        });
    </script>
    @endscript
</div>