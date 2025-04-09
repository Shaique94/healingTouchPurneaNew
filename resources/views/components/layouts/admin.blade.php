<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f4f9;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #1e1e2f;
            color: white;
            z-index: 1000;
        }

        .sidebar h4 {
            padding: 20px;
            border-bottom: 1px solid #444;
        }

        .sidebar a {
            color: #bbb;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #343a40;
            color: white;
        }

        .sidebar i {
            margin-right: 10px;
        }

        .header {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .toggle-sidebar {
            display: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: inline-block;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4 class="text-center">Admin</h4>
        <a wire:navigate href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a wire:navigate href="#"><i class="bi bi-people"></i> Appointment</a>
        <a wire:navigate href="#"><i class="bi bi-box-seam"></i>Manage Slot</a>
        <a wire:navigate href="#"><i class="bi bi-gear"></i>Manage Doctor</a>
        <a wire:navigate href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-list toggle-sidebar fs-3 d-md-none" id="toggleSidebar"></i>
                <h5 class="d-inline-block ms-2">Dashboard</h5>
            </div>
            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-person-circle"></i> Profile</button>
        </div>

        <!-- Blade slot for content -->
        {{ $slot }}
    </div>

    <script>
        const toggleSidebar = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");

        toggleSidebar?.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
