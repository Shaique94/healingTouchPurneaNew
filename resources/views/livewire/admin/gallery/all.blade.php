<div class="container-fluid py-4 px-4 bg-light min-vh-100">
  

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded-3 shadow-sm mb-4">
        <div>
            <h4 class="mb-1">Gallery Management</h4>
            <p class="text-muted mb-0">Manage your gallery images and media</p>
        </div>
        <button class="btn btn-primary d-flex align-items-center gap-2" wire:click="$dispatch('openModal')">
            <i class="bi bi-plus-lg"></i> Add
        </button>
    </div>

    <!-- Gallery Grid -->
    <div class="row g-4">
        @forelse($galleries as $gallery)
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <!-- Image Section -->
                    <div class="position-relative">
                        <img src="{{ asset('storage/gallery/'. $gallery->filename) }}" 
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;"
                             alt="{{ $gallery->alt }}">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge bg-white text-dark shadow-sm">
                                <i class="bi bi-folder me-1"></i>{{ $gallery->category }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="card-body">
                        <h6 class="card-title mb-2 text-truncate">{{ $gallery->alt }}</h6>
                        <p class="card-text small text-muted">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $gallery->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <!-- Actions Section -->
                    <div class="card-footer border-0 bg-transparent pt-0">
                        <div class="d-grid gap-2 d-sm-flex">
                            <button class="btn btn-light btn-sm flex-fill d-flex align-items-center justify-content-center" 
                                    wire:click="$dispatch('openUpdateModal', { id: {{ $gallery->id }} })">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </button>
                            <button class="btn btn-light btn-sm flex-fill d-flex align-items-center justify-content-center text-danger" 
                                    wire:click="alertConfirm({{ $gallery->id }})">
                                <i class="bi bi-trash me-1"></i>Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-images text-muted" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">No Images Found</h5>
                    <p class="text-muted">Start by adding some images to your gallery</p>
                </div>
            </div>
        @endforelse
    </div>

    <livewire:admin.gallery.add/>
    <livewire:admin.gallery.update/>
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
                    @this.call('delete', event.detail.galleryId)
                }
            })
        });
    </script>
    @endscript

    <style>
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1)!important;
        }
        .btn-light {
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-light:hover {
            background-color: #e9ecef;
            border-color: #e9ecef;
        }
        /* Add these new styles */
        .btn-sm {
            padding: 0.5rem;
            font-size: 0.875rem;
            min-width: 80px;
        }
        @media (max-width: 575.98px) {
            .d-grid.gap-2 {
                gap: 0.5rem !important;
            }
        }
    </style>
</div>