<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.pusher.com/8.3.0/pusher.min.js"></script>

    <title>
        {{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital | Online Appointment Booking') : config('app.name', 'Healing Touch Hospital | Online Appointment Booking') }}
    </title>

    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="description"
        content="Healing Touch Hospital, Linebazar, Purnea offers online appointments, specialist doctors, and complete healthcare services.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Hospital",
            "name": "Healing Touch Hospital",
            "url": "https://healingtouchpurnea.com/",
            "logo": "https://healingtouchpurnea.com/healingTouchLogo.jpeg",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Hope Chauraha, Rambagh Road, Linebazar",
                "addressLocality": "Purnea",
                "addressRegion": "Bihar",
                "postalCode": "854301",
                "addressCountry": "IN"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+91-9471659700",
                "contactType": "Customer Support",
                "areaServed": "IN",
                "availableLanguage": ["English", "Hindi"]
            },
            "description": "Healing Touch Hospital offers online appointment booking with expert surgeons and gynecologists in Purnea, Bihar.",
            "medicalSpecialty": ["Laparoscopic Surgery", "Laser Surgery", "Gynecology", "General Surgery"],
            "department": [{
                    "@type": "MedicalClinic",
                    "name": "Surgery Department",
                    "medicalSpecialty": "General Surgery",
                    "availableService": "Laparoscopic and laser surgeries",
                    "physician": {
                        "@type": "Physician",
                        "name": "Dr. Charly Kumar Sinha",
                        "medicalSpecialty": "Surgery",
                        "jobTitle": "Senior Surgeon"
                    }
                },
                {
                    "@type": "MedicalClinic",
                    "name": "Gynecology Department",
                    "medicalSpecialty": "Gynecology",
                    "physician": {
                        "@type": "Physician",
                        "name": "Dr. Kiran Kumari",
                        "medicalSpecialty": "Gynecology"
                    }
                }
            ],
            "sameAs": [
                "https://www.facebook.com/profile.php?id=61573927387041",
                "https://www.instagram.com/_healingtouchhospital_?igsh=cDh4cDJjMGRpMnNx"
            ]
        }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="w-full flex flex-col min-h-screen">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 bg-gray-100">
        <div class="w-full bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let lastToastTime = 0;
        const TOAST_COOLDOWN_MS = 10000; // 10 seconds

        document.addEventListener('DOMContentLoaded', () => {
            const audio = document.getElementById('notification-sound');

            if (window.Echo && typeof window.Echo.channel === 'function') {
                window.Echo.channel('receptionist-channel')
                    .listen('.appointment-booked', (event) => {
                        const now = Date.now();

                        if (now - lastToastTime >= TOAST_COOLDOWN_MS) {
                            lastToastTime = now;

                            if (audio) {
                            audio.play().catch((e) => {
                                console.warn('Unable to play sound automatically:', e);
                            });
                        }

                            Swal.fire({
                                icon: 'info',
                                title: 'New Appointment!',
                                text: `Appointment booked for ${event.appointment.patient.name ?? 'Unknown'}`,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            });
                        }
                    });
            } else {
                console.error('Echo is not defined');
            }
        });
    </script>

    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.on('show-collect-confirmation', data => {
                const {
                    appointmentId,
                    pendingAmount
                } = data[0];

                Swal.fire({
                    title: 'Collect Payment',
                    html: `Pending Amount to Collect: <b>₹${pendingAmount}</b>`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Collected'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('collectNow', {
                            appointmentId: appointmentId
                        });
                    }
                });
            });

            Livewire.on('payment-collected-success', () => {
                Swal.fire(
                    'Success!',
                    'Payment marked as Paid.',
                    'success'
                )
            });

            Livewire.on('confirm-check-in', (data) => {
                const appointmentId = data[0].appointmentId;
                // console.log('RECEIVED:', appointmentId); 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to check-in this appointment!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Check-in!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('doCheckIn', {
                            appointmentId
                        });
                        console.log('sending appointment after confirmation', appointmentId);
                    }
                });
            });


            Livewire.on('alert', (data) => {
                const {
                    type,
                    message
                } = data[0]; // access the first item in the array


                Swal.fire({
                    icon: type,
                    text: message,
                    timer: 2000,
                    showConfirmButton: false,
                });
            });
        });
    </script>



</body>

</html>