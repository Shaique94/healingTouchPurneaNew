<div class="header d-flex justify-content-between align-items-center bg-white shadow-sm px-3 py-2 rounded-3 mb-3">
    <!-- Left: Sidebar Toggle and Page Title -->
    <div class="d-flex align-items-center">
        <button class="btn btn-light border-0 d-lg-none me-2 p-2 shadow-sm" id="toggleSidebar">
            <i class="bi bi-list fs-4 text-primary"></i>
        </button>
        <h5 class="mb-0 fw-semibold text-dark">{{ $pageTitle ?? 'Dashboard' }}</h5>
    </div>

    <!-- Right: Profile Dropdown -->
    <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
            <button class="btn btn-light d-flex align-items-center gap-2 rounded-pill shadow-sm px-3 py-2 dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5 text-primary"></i>
                <span class="d-none d-sm-inline fw-medium text-dark">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3" aria-labelledby="profileDropdown">
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-gear text-secondary"></i> Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-person-lines-fill text-secondary"></i> My Account
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="{{ route('admin.logout') }}">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
