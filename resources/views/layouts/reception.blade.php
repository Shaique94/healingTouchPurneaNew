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
                "telephone": "+91-7079025467",
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
            // const audio = document.getElementById('notification-sound');

            if (window.Echo && typeof window.Echo.channel === 'function') {
                window.Echo.channel('receptionist-channel')
                    .listen('.appointment-booked', (event) => {
                        const now = Date.now();
                        const audio = document.getElementById('notification-sound');


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

                            Livewire.dispatch('appointment-booked');

                        }
                    });
            } else {
                console.error('Echo is not defined');
            }
        });
    </script>

    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.dispatch('appointmentBooked');

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
    <div class="flex justify-end items-center">
        <div x-data="noticesHandler()"
            class="fixed top-5 right-5 flex flex-col items-end space-y-3 z-50"
            @notice.window="add($event.detail)"
            style="pointer-events:none">
            <template x-for="notice in notices" :key="notice.id">
                <div x-show="visible.includes(notice)"
                    x-transition:enter="transition ease-in duration-300"
                    x-transition:enter-start="transform opacity-0 translate-y-2"
                    x-transition:enter-end="transform opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-300"
                    x-transition:leave-start="transform opacity-100 translate-y-0"
                    x-transition:leave-end="transform opacity-0 translate-y-2"
                    @click="remove(notice.id)"
                    class="rounded-lg shadow-lg max-w-sm w-full bg-white border-l-4 border-beige-500 p-4 flex items-center justify-between cursor-pointer transform hover:scale-102 transition-all duration-200"
                    style="pointer-events:all">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-beige-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium text-sm" x-text="notice.text"></p>
                    </div>
                    <button @click="remove(notice.id)" class="ml-4 text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </div>

    <script>
        function noticesHandler() {
            return {
                notices: [],
                visible: [],
                add(notice) {
                    notice.id = Date.now();
                    this.notices.push(notice);
                    this.fire(notice.id);
                },
                fire(id) {
                    this.visible.push(this.notices.find(notice => notice.id === id));
                    setTimeout(() => {
                        this.remove(id);
                    }, 2500);
                },
                remove(id) {
                    this.visible = this.visible.filter(notice => notice.id !== id);
                },
            };
        }
    </script>



</body>

</html>