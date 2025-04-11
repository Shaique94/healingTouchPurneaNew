<div class="sidebar" id="sidebar">
        <h4 class="text-center">Admin</h4>
        <a wire:navigate href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a wire:navigate href="{{ route('admin.appointment') }}"><i class="bi bi-people"></i>Appointment</a>
        <a wire:navigate href="{{ route('admin.qualification') }}"><i class="bi bi-people"></i>Manage Qualification</a>
        <a wire:navigate href="{{ route('admin.department') }}"><i class="bi bi-people"></i>Manage Department</a>
        <a wire:navigate href="{{ route('admin.doctor') }}"><i class="bi bi-gear"></i>Manage Doctor</a>
        <a wire:navigate href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
