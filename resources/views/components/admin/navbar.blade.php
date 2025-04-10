<div class="header d-flex justify-content-between align-items-center bg-white shadow-sm px-4 py-3 mb-4">
    <!-- Left: Toggle and Title -->
    <div class="d-flex align-items-center">
        <i class="bi bi-list toggle-sidebar fs-3 d-md-none text-primary me-3" id="toggleSidebar" style="cursor: pointer;"></i>
        <h5 class="mb-0 fw-semibold text-dark">Dashboard</h5>
    </div>

    <!-- Middle: Search Bar -->
    <div class="d-none d-md-block w-50 mx-4">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm rounded-pill" placeholder="Search...">
            <span class="input-group-text bg-white border-0">
                <i class="bi bi-search text-muted"></i>
            </span>
        </div>
    </div>

    <!-- Right: Actions -->
    <div class="d-flex align-items-center gap-3">
        <!-- Notification Bell -->
        <div class="position-relative">
            <i class="bi bi-bell fs-5 text-secondary" style="cursor: pointer;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                3
            </span>
        </div>

        <!-- Profile Dropdown -->
        <div class="dropdown">
            <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 rounded-pill px-3 py-2 dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="d-none d-sm-inline">Profile</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill me-2"></i>My Account</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
