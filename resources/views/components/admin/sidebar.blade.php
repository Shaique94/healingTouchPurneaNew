<div class="sidebar" id="sidebar">
    <div class="d-flex justify-content-center align-items-center mb-4 mt-3" style="gap: 12px; border-radius: 50px;">
        <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Logo" style="width: 40px; height: 40px; border-radius: 12px; object-fit: cover;">
        <span style="font-size: 18px; font-weight: 600; color: white;">Healing Touch</span>
    </div>

    <a wire:navigate href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a wire:navigate href="{{ route('admin.appointment') }}"><i class="bi bi-people"></i>Appointment</a>
    <a wire:navigate href="{{ route('admin.receptioner') }}"><i class="bi bi-people"></i>Manage Receptioner</a>
    <a wire:navigate href="{{ route('admin.department') }}"><i class="bi bi-people"></i>Manage Department</a>
    <a wire:navigate href="{{ route('admin.doctor') }}"><i class="bi bi-gear"></i>Manage Doctor</a>
    <a wire:navigate href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>