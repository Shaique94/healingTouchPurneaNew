<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Healing Touch Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
            z-index: 1030;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            color: white;
            margin-left: 12px;
        }

        .sidebar a {
            color: rgba(255, 255, 255, 0.7);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.25s ease;
            border-radius: 6px;
            margin: 4px 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            border-left: 3px solid #4f46e5;
            background: rgba(79, 70, 229, 0.15);
        }

        .sidebar i {
            margin-right: 10px;
            font-size: 1.1rem;
            min-width: 24px;
            text-align: center;
        }

        /* Header Styling */
        .header {
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border-bottom: 1px solid #eaeaea;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        /* Main Content */
        .main {
            margin-left: 250px;
            padding: 15px 25px;
            transition: margin-left 0.3s ease;
        }

        /* Card Styling */
        .content-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            border: none;
        }

        /* Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1025;
            display: none;
            transition: opacity 0.3s ease;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .sidebar-overlay.active {
                display: block;
            }

            .header {
                position: sticky;
                top: 0;
                z-index: 1020;
            }

            .sidebar .close-btn {
                display: block;
                position: absolute;
                top: 15px;
                right: 15px;
                color: white;
                background: transparent;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease;
        }

        /* Profile Dropdown */
        .profile-dropdown .dropdown-item {
            padding: 8px 16px;
            display: flex;
            align-items: center;
        }

        .profile-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .profile-dropdown .dropdown-item.text-danger:hover {
            background-color: #fff5f5;
        }
    </style>
    @livewireStyles
</head>

<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    @include('components.admin.sidebar')
    <!-- Main Content -->
    <div class="main" id="main">
        <!-- Header -->
        @include('components.admin.navbar')

        <!-- Content Area -->
        {{ $slot }}
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>


    <script>
        // Sidebar Toggle Functionality
        document.addEventListener('livewire:navigated', function() {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main');
            const toggleBtn = document.getElementById('toggleSidebar');
            const closeBtn = document.getElementById('closeSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            // Toggle sidebar
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            });

            // Close sidebar
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });

            // Close when clicking overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });

            // Handle resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 991) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        // Reinitialize Bootstrap components after Livewire updates
        document.addEventListener("livewire:navigated", function() {
            function reloadBootstrap() {
                var tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                tooltips.forEach(t => new bootstrap.Tooltip(t));

                var popovers = document.querySelectorAll('[data-bs-toggle="popover"]');
                popovers.forEach(p => new bootstrap.Popover(p));

                var dropdowns = document.querySelectorAll('.dropdown-toggle');
                dropdowns.forEach(d => new bootstrap.Dropdown(d));
            }

            reloadBootstrap();
        });

        // Sweet Alert Notifications
        const toastSuccess = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'Notification',
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        const toastError = Swal.mixin({
            toast: true,
            icon: 'error',
            title: 'Notification',
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        const toastWarning = Swal.mixin({
            toast: true,
            icon: 'warning',
            title: 'Notification',
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('success', (message) => {
                toastSuccess.fire({
                    animation: true,
                    title: message,
                });
            });

            Livewire.on('error', (message) => {
                toastError.fire({
                    animation: true,
                    title: message,
                });
            });

            Livewire.on('warning', (message) => {
                toastWarning.fire({
                    animation: true,
                    title: message,
                });
            });
        });

    
        // Initialize flatpickr
        document.addEventListener('livewire:navigated', () => {
            if (document.getElementById('dateRangePicker')) {
                flatpickr("#dateRangePicker", {
                    mode: "range",
                    dateFormat: "Y-m-d"
                });
            }
        });
        
    </script>

    @livewireScripts
</body>

</html>