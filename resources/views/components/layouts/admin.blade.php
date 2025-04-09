<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    @livewireStyles
</head>

<body>

    <!-- Sidebar -->
    <x-admin.sidebar />
    <!-- Main Content -->
    <div class="main">
        <!-- Header -->
        <x-admin.navbar />

        <!-- Blade slot for content -->
        {{ $slot }}
    </div>
    <div
        x-data="{ show: false, message: '', type: 'success' }"
        x-on:success.window="show = true; message = $event.detail; type = 'success'; setTimeout(() => show = false, 3000)"
        x-show="show"
        class="position-fixed bottom-0 end-0 p-3"
        style="z-index: 1055;">
        <div
            class="toast align-items-center text-white bg-success border-0 show"
            role="alert"
            x-show="show">
            <div class="d-flex">
                <div class="toast-body">
                    <span x-text="message"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        window.addEventListener('OpenAddModal', function(event) {
            $('.OpenAddModals').find('span').html('');
            $('.OpenAddModals').modal('show');
        });

        window.addEventListener('OpenEditModal', function(event) {
            $('.OpenEditModals').find('span').html('');
            $('.OpenEditModals').modal('show');
        });

        window.addEventListener('OpenSubModal', function(event) {
            $('.OpenSubModals').find('span').html('');
            $('.OpenSubModal').modal('show');
        });
    </script>



    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>