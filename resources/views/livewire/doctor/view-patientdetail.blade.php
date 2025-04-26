<div class="min-h-screen bg-gray-50/50">
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Back Navigation -->
        <a href="{{ route('doctor.dashboard') }}" class="group inline-flex items-center space-x-2 text-sm font-medium text-gray-600 hover:text-gray-900 mb-8">
            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            <span>Return to Dashboard</span>
        </a>

        <!-- Main Content -->
        <div class="space-y-6">
            <!-- Patient Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-beige-500 to-beige-600 px-6 py-4">
                    <h1 class="text-xl font-semibold text-white">Patient Information</h1>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                        <div>
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-beige-100 rounded-lg">
                                    <svg class="w-5 h-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Full Name</p>
                                    <p class="text-sm text-gray-900">{{ $patient->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-beige-100 rounded-lg">
                                    <svg class="w-5 h-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Age & Gender</p>
                                    <p class="text-sm text-gray-900">{{ $patient->age }} years, {{ ucfirst($patient->gender) }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-beige-100 rounded-lg">
                                    <svg class="w-5 h-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Contact</p>
                                    <p class="text-sm text-gray-900">{{ $patient->phone ?? 'Not provided' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointment Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-beige-500 to-beige-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Current Appointment</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-beige-100 rounded-lg">
                                    <svg class="w-5 h-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Appointment Date & Time</p>
                                    <p class="text-sm text-gray-900">
                                        {{ $currentAppointment->appointment_date }} at {{ $currentAppointment->appointment_time }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-beige-100 rounded-lg">
                                    <svg class="w-5 h-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Status</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$currentAppointment->status] }}">
                                        {{ $statusDisplay[$currentAppointment->status] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="border-t md:border-t-0 md:border-l border-gray-100 md:pl-8 pt-6 md:pt-0">
                            <div class="space-y-2">
                                <p class="text-xs text-gray-500 font-medium">Notes</p>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ $currentAppointment->notes ?? 'No notes available for this appointment.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
