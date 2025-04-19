<div class="sidebar" id="sidebar">
        <button class="close-btn d-lg-none" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
        
        <div class="sidebar-brand d-flex align-items-center">
            <img src="{{ \App\Models\Setting::get('logo', asset('healingTouchLogo.jpeg' )) }}" alt="Hospital Logo" class="sidebar-logo">

            <span class="sidebar-title">{{ \App\Models\Setting::get('hospital_name', 'Healing Touch ') }}</span>
        </div>
       
        <div class="nav-links mt-3">
            <a wire:navigate href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> <span>Dashboard</span>
            </a>
            <a wire:navigate href="{{ route('admin.appointment') }}" class="{{ request()->routeIs('admin.appointment') ? 'active' : '' }}">
                <i class="bi bi-calendar2-check"></i> <span>Appointments</span>
            </a>
            <a wire:navigate href="{{ route('admin.user') }}" class="{{ request()->routeIs('admin.user') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> <span>Manage Users</span>
            </a>
            <a wire:navigate href="{{ route('admin.department') }}" class="{{ request()->routeIs('admin.department') ? 'active' : '' }}">
                <i class="bi bi-hospital"></i> <span>Departments</span>
            </a>
            <a wire:navigate href="{{ route('admin.doctor') }}" class="{{ request()->routeIs('admin.doctor') ? 'active' : '' }}">
                <i class="bi bi-person-vcard"></i> <span>Manage Doctors</span>
            </a>
            <a wire:navigate href="{{ route('admin.add.career') }}" class="">
                <i class="bi bi-briefcase"></i><span>Manage Job</span>
            </a>
            <a wire:navigate href="{{ route('admin.gallery') }}" class="">
                <i class="bi bi-images"></i><span>Manage Gallery</span>
            </a>
            <a wire:navigate href="{{ route('admin.settings') }}" class="">
                <i class="bi bi-gear"></i><span>Settings</span>
            </a>
            <a wire:navigate href="{{ route('admin.logout') }}">
                <i class="bi bi-power"></i> <span>Logout</span>
            </a>
        </div>
    </div>
