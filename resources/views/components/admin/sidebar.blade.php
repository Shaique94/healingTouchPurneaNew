<div class="sidebar" id="sidebar">
        <button class="close-btn d-lg-none" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
        
        <div class="sidebar-brand d-flex align-items-center">
            <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Logo" class="sidebar-logo">
            <span class="sidebar-title">Healing Touch</span>
        </div>
        
        <div class="nav-links mt-3">
            <a wire:navigate href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
            </a>
            <a wire:navigate href="{{ route('admin.appointment') }}" class="{{ request()->routeIs('admin.appointment') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> <span>Appointments</span>
            </a>
            <a wire:navigate href="{{ route('admin.user') }}" class="{{ request()->routeIs('admin.user') ? 'active' : '' }}">
                <i class="bi bi-people"></i> <span>Manage Users</span>
            </a>
            <a wire:navigate href="{{ route('admin.department') }}" class="{{ request()->routeIs('admin.department') ? 'active' : '' }}">
                <i class="bi bi-building"></i> <span>Departments</span>
            </a>
            <a wire:navigate href="{{ route('admin.doctor') }}" class="{{ request()->routeIs('admin.doctor') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> <span>Manage Doctors</span>
            </a>
            <a wire:navigate href="{{ route('admin.add.career') }}" class="">
                <i class="bi bi-backpack4"></i><span>Manage Job</span>
            </a>
            <a wire:navigate href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
            </a>
        </div>
    </div>
